<? defined("FKN") or http_response_code(403).die('Forbidden!');

/**
 * ##########################################################################################
 * ### F4LK0N's Custom PHP Variables Debugger ###
 * ##########################################################################################
 *
 * Version:
 *      2.8.1
 * Last Update:
 *      2019/06/08 (YYYY/MM/DD)
 * Code Repository:
 *      https://github.com/F4LK0N/PHP-VariablesDebugger.git
 *
 * Author:
 *      Otavio Bernardes Soria
 * Email:
 *      otaviosoria@gmail.com
 *
 *
 * ##########################################################################################
 * ### Author's Message ###
 * ##########################################################################################
 *
 * I made this code for myself to help tasks like debug online environments where the default
 * var_dump function can't be formatted easily (with xdebug for example) and I need to
 * visualize and understand variables with huge contents.
 *
 * It helped me a lot, and still does. I'm sharing it with you in hope it do the same.
 *
 * The code is simple and I tried to let its code clear and well commented as possible.
 *
 * I don't expect to apply any type of copyright or restrictions to this code, fell free to
 * use it as you want.
 *
 * If desire to recognize my work about this code, you can point or share a link to the
 * github repository where you judge right in your project or whatever you are doing.
 *
 * Feel free to edit this code and use in your projects as you wish.
 *
 * Enjoy!
 *
 * ##########################################################################################
 */





/**
 * ##########################################################################################
 * ### Caller Path Display Format ###
 * ##########################################################################################
 *
 * When you call the debugger function to debug a variable's value, the caller file's path is displayed within the number of the line where the call has made;
 * You can choose to display the absolute path of the file, or a path relative to you project's root directory, or even don't show nothing at all;
 *
 * This is done using the 'substr' function and setting the 'start' with the value defined by this variable:
 *     $GLOBALS['variable_debugger___caller_path_display_format']
 *
 * Display Format Configuration:
 *     - Display Relative Path:
 *         - Modify this line to point to the root of your application (where the first index.php is at.);
 *         - Beginning from this folder where this file are placed, add one 'dirname' function involving '__FILE__' for each directory you have to step up until you reach the root directory of your application;
 *         - Optionally to improve your framework startup performance, you can set the value to the direct integer value returned by 'strlen(dirname(...(__FILE__)))';
 *
 *     - Display Absolute Path:
 *         - Set the value to zero (0)(integer);
 *
 *     - Hide Path:
 *         - Set the value to false (boolean);
 */
$GLOBALS['variable_debugger___caller_path_display_format'] = 1+strlen(dirname(dirname(dirname(__FILE__))));
//$GLOBALS['variable_debugger___caller_path_display_format'] = 0;
//$GLOBALS['variable_debugger___caller_path_display_format'] = false;





/**
 * ##########################################################################################
 * ### Nesting Calls Limit ###
 * ##########################################################################################
 *
 * Limit the nesting functions calls that can be made from VD to itself when debugging
 * variables inside variables, to avoid infinite loops and others unexpected behaviors.
 *
 */
$GLOBALS['variable_debugger___nesting_max'] = 10;





/**
 * ##########################################################################################
 * ### Variable Debugger and Die ###
 * ##########################################################################################
 *
 * Debugs an variable's content and stop the scripts execution at the end.
 *
 * @param mixed $mixed
 *      Any variable you want to debug.
 */
function VDD($mixed)
{
    $GLOBALS['variable_debugger___caller_distance'] = 1;
    VD($mixed);
    die;
}





/**
 * ##########################################################################################
 * ### Variable Debugger ###
 * ##########################################################################################
 *
 * Debugs an variable's content.
 *
 * @param mixed $mixed
 *      Any variable you want to debug.
 *
 * @return null;
 *
 */
function VD($mixed)
{
    //HTTP Header
    @header("Content-Type: text/html; charset=utf-8");
    
    
    //Nesting
    if(!isset($GLOBALS['variable_debugger___nesting_current']))
        $GLOBALS['variable_debugger___nesting_current'] = 0;
    if($GLOBALS['variable_debugger___nesting_current']>$GLOBALS['variable_debugger___nesting_max'])
        return print"<div class='variable-debug' style='padding:10px;border:1px solid rgba(255,0,0,0.2);color:#A00;'><b>!!! NESTED CALLS LIMIT !!!</b></div>";
    $GLOBALS['variable_debugger___nesting_current']++;
    
    
    //Self Reference
    if($GLOBALS['variable_debugger___nesting_current']===1){
        $GLOBALS['variable_debugger___starter_reference'] = null;
        if(is_array($mixed) || is_object($mixed))
            $GLOBALS['variable_debugger___starter_reference'] = &$mixed;
    }
    
    
    //Container
    print
    "<div class='variable-debug' style='padding:10px;border:1px solid rgba(0,0,0,0.2);'>";
    
        //Caller
        if($GLOBALS['variable_debugger___nesting_current']===1)
        {
            if(!isset($GLOBALS['variable_debugger___caller_distance']))
                $GLOBALS['variable_debugger___caller_distance'] = 0;
            
            $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $GLOBALS['variable_debugger___caller_distance']+2);
            $caller1 = $trace[$GLOBALS['variable_debugger___caller_distance']];
            $caller2 = @$trace[$GLOBALS['variable_debugger___caller_distance']+1];
            
            print
            "<div style='font-size:12px;color:rgba(0,0,0,0.25);margin-bottom:8px;'>".
                //Path
                "<small><u>".substr($caller1['file'], $GLOBALS['variable_debugger___caller_path_display_format'], -4)."</u></small>:<b>".$caller1['line']."</b>".
                //Function or Method
                (($caller2===null)?"":" &nbsp; - &nbsp; <small>".@$caller2['class'].@$caller2['type'].@$caller2['function']."()</small>").
            "</div>";
            
            unset($GLOBALS['variable_debugger___caller_distance']);
        }
    
        
        //Variable Debug
        {
            //Type
            {
                print
                "<div style='font-size:18px';>";

                    //Name
                    print
                    "<b>".gettype($mixed)."</b>";
                    
                    //Additional Info
                    {
                        //String Length
                        if(is_string($mixed)) print
                            " : <b>".strlen($mixed)."</b> <small><small>char(s)</small></small>";
                        //Array Size
                        else if(is_array($mixed)) print
                            " : <b>".count($mixed)."</b> <small><small>element(s)</small></small>";
                        //Object Attributes and Methods
                        else if(is_object($mixed))
                        {
                            $attributes=[];
                            $methods=[];


                            //Reflection Method Extraction
                            try
                            {
                                $reflectionClass = new ReflectionClass($mixed);

                                //Attributes
                                $reflectionClassAttributes = $reflectionClass->getProperties();
                                foreach($reflectionClassAttributes as $row){
                                    $attributes[$row->name] = [
                                        "static" => $row->isStatic(),
                                        "private" => $row->isPrivate(),
                                        "protected" => $row->isProtected(),
                                        "public" => $row->isPublic(),
                                        "value" => "",
                                    ];
                                    $row->setAccessible(true);
                                    $attributes[$row->name]["value"] = $row->getValue($mixed);
                                }
                                unset($reflectionClassAttributes, $row);

                                //Methods
                                $reflectionClassMethods = $reflectionClass->getMethods();
                                foreach($reflectionClassMethods as $row){
                                    $methods[$row->name] = [
                                        "abstract" => $row->isAbstract(),
                                        "final" => $row->isFinal(),
                                        "static" => $row->isStatic(),
                                        "private" => $row->isPrivate(),
                                        "protected" => $row->isProtected(),
                                        "public" => $row->isPublic(),
                                    ];
                                }
                                unset($reflectionClassMethods, $row);

                                unset($reflectionClass);
                            }
                            catch (Exception $e)
                            {
                                $attributes['ERROR'] = "PHP Reflection Class Exception: $e";
                            }


                            //Default Method Extraction
                            {
                                $classAttributes = get_object_vars($mixed);
                                foreach($classAttributes as $key => $value){
                                    if(isset($attributes[$key]))
                                        continue;
                                    $attributes[$key] = [
                                        "static" => false,
                                        "private" => false,
                                        "protected" => false,
                                        "public" => true,
                                        "value" => $value,
                                    ];
                                }
                                unset($classAttributes, $key, $value);
                            }


                            print
                            " : <b>".count($attributes)."</b> <small><small>attribute(s)</small></small> &nbsp; &nbsp; <b>".count($methods)."</b> <small><small>methods(s)</small></small>";
                        }
                    }
                print
                "</div>";
            }
            
            //Value
            {
                print
                "<div style='font-size:16px;padding:10px 18px;margin:2px 10px 0;background-color:rgba(0,0,0,0.1);border-radius:10px;'>";

                    //Null
                    if(is_null($mixed)) print
                        "<b style='color:#A00;'>NULL</b>";
                    
                    //Boolean
                    else if(is_bool($mixed)) print
                        ($mixed===true?"<b style='color:#0A0;'>TRUE</b>":"<b style='color:#A00;'>FALSE</b>");

                    //Integer | Long | Float | Double
                    else if(is_int($mixed) || is_float($mixed)) print
                        "<b style='color:#0A0;'>$mixed</b>";

                    //String
                    else if(is_string($mixed)) print
                        ($mixed===""?'""':$mixed);

                    //Array
                    else if(is_array($mixed))
                    {
                        print
                        "<table style='width:100%;border-collapse:collapse;'>";
                            foreach ($mixed as $key => $value)
                            {
                                print
                                "<tr>".
                                    //Key
                                    "<th style='text-align:right;vertical-align:top;padding:15px 10px;width:10px;'>[$key]</th>";
                                
                                    //Value
                                    {
                                        print
                                        "<td>";
                                            //Self Reference
                                            if($GLOBALS['variable_debugger___starter_reference']!==null && $GLOBALS['variable_debugger___starter_reference']===$value)
                                                print"<div class='variable-debug' style='padding:10px;border:1px solid rgba(0,0,0,0.2);color:#A00;'><b>&SELF REFERENCE</b></div>";
                                            //Normal Value
                                            else
                                                VD($value);
                                        print
                                        "</td>";
                                    }
                                print
                                "</tr>";
                            }
                        print
                        "</table>";
                    }
                    
                    //Object
                    else if(is_object($mixed))
                    {
                        print
                        "<table style='width:100%;border-collapse:collapse;'>";
                        
                            //Static|Instance
                            for($mustBeStatic=0; $mustBeStatic<2; $mustBeStatic++)
                            {
                                //Attributes
                                if(isset($attributes))
                                    foreach ($attributes as $key => $row)
                                    {
                                        if($row['static']===($mustBeStatic===1))
                                            continue;
                                        
                                        print
                                        "<tr>".
                                        
                                            //Key
                                            "<th style='text-align:right;vertical-align:top;padding:15px 10px;width:10px;'>".
                                                
                                                //Modifiers
                                                "<small>".
                                                    ($row['static']?"<b style='color:#00A;'>static</b> ":"").
                                                    ($row['private']?"<b style='color:#A00;'>private</b>":"").
                                                    ($row['protected']?"<b style='color:#AA0;'>protected</b>":"").
                                                    ($row['public']?"<b style='color:#0A0;'>public</b>":"").
                                                "</small><br>".
                                                
                                                //Name
                                                "$key:".
                                            "</th>";
                
                                            //Value
                                            print
                                            "<td>";
                                                //Self Reference
                                                if($GLOBALS['variable_debugger___starter_reference']!==null && $GLOBALS['variable_debugger___starter_reference']===$row['value'])
                                                    print"<div class='variable-debug' style='padding:10px;border:1px solid rgba(0,0,0,0.2);color:#A00;'><b>&SELF REFERENCE</b></div>";
                                                //Normal Value
                                                else
                                                    VD($row['value']);
                                            print
                                            "</td>".
                                        "</tr>";
                                    }
        
                                //Methods
                                if(isset($methods))
                                    foreach ($methods as $key => $row)
                                    {
                                        if($row['static']===($mustBeStatic===1))
                                            continue;
                                        
                                        print
                                        "<tr>".
                                        
                                            //Key
                                            "<th style='text-align:right;vertical-align:top;padding:15px 10px;width:10px;'>".
                                                
                                                //Modifiers
                                                "<small>".
                                                    ($row['static']?"<b style='color:#00A;'>static</b> ":"").
                                                    ($row['abstract']?"<b style='color:#A0A;'>abstract</b> ":"").
                                                    ($row['final']?"<b style='color:#A0A;'>final</b> ":"").
                                                    ($row['private']?"<b style='color:#A00;'>private</b>":"").
                                                    ($row['protected']?"<b style='color:#AA0;'>protected</b>":"").
                                                    ($row['public']?"<b style='color:#0A0;'>public</b>":"").
                                                "</small><br>".
                                                
                                                //Name
                                                "$key();".
                                            "</th>";
                
                                            //Value
                                            print
                                            "<td>".
                                                "<div class='variable-debug' style='padding:10px;border:1px solid rgba(0,0,0,0.2);'>" .
                                                    "<div style='font-size:18px;color:#999;'><b>method</b></div>".
                                                    "<div style='font-size:16px;padding:10px 18px;margin:2px 10px 0;background-color:rgba(0,0,0,0.025);border-radius:10px;width:50px;'>&nbsp;</div>".
                                                "</div>".
                                            "</td>".
                                        "</tr>";
                                    }
                            }
                            
                        print
                        "</table>";
                    }
                    
                    //Resource
                    else if(is_resource($mixed))
                    {
                        print
                        "<b style='color:#A00;'>".get_resource_type($mixed)." resource</b>";
                    }
                    
                    //Unknown
                    else print
                        "<b style='color:#A00;'>!!! UNKNOWN TYPE !!!</b>";

                print
                "</div>";
            }
        }
        
    //Container
    print
    "</div>";
    
    
    //Self Reference
    if($GLOBALS['variable_debugger___nesting_current']===1)
        unset($GLOBALS['variable_debugger___starter_reference']);
    
    
    //Nesting
    $GLOBALS['variable_debugger___nesting_current']--;
    if($GLOBALS['variable_debugger___nesting_current']===0)
        unset($GLOBALS['variable_debugger___nesting_current']);
    
}
