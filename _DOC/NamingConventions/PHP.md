# CONSTANT

- Name in `upper-case` style;
- Words separated by underscore `"_"`;
- Group concepts separated by three underscores `"___"`;

```PHP
CONSTANT_NAME
GROUP_NAME___CONSTANT_NAME
```

# VARIABLE
Local scope variable.
- Name in `camel-case` style;
- Group concepts separated by underscore `"_"`;
```PHP
variableName
groupName_variableName
```
<br><br>



# CLASS

Regular class used to instantiate objects.
- Name in `pascal-case` style (camel-case with first letter upper-case);
- Group concepts separated by underscore `"_"`;
```PHP
ClassName
GroupName_ClassName
```
<br><br>



# CLASS ATTRIBUTE

Regular class attribute from instances.
- Name in `camel-case` style;
- Group concepts separated by underscore `"_"`;
```PHP
attributeName
groupName_attributeName
```
<br><br>



# CLASS METHOD

Regular class method called from instances.
- Name in `camel-case` style;
- Group concepts separated by underscore `"_"`;
```PHP
methodName
groupName_methodName
```
<br><br>



# STATIC CLASS

Classes that have only static properties and methods, commonly used like helpers or providers.
- Name in `upper-case` style;
- Words separated by underscore `"_"`;
- Group concepts separated by three underscores `"___"`;
```PHP
CLASS_NAME
GROUP_NAME___CLASS_NAME
```
<br><br>



# STATIC CLASS ATTRIBUTE

Static class attribute.
- Name in `upper-case` style;
- Words separated by underscore `"_"`;
- Group concepts separated by three underscores `"___"`;
```PHP
ATTRIBUTE_NAME
GROUP_NAME___ATTRIBUTE_NAME
```
<br><br>



# STATIC CLASS METHOD

Static class method.
- Name in `upper-case` style;
- Words separated by underscore `"_"`;
- Group concepts separated by three underscores `"___"`;
```PHP
METHOD_NAME
GROUP_NAME___METHOD_NAME
```
<br><br>



# ENUMERATION

- Name in `upper-case` style;
- Words separated by underscore `"_"`;
- Group concepts separated by three underscores `"___"`;
```PHP
ENUMERATION_NAME
GROUP_NAME___ENUMERATION_NAME
```
<br><br>



# ENUMERATION VALUE

- Name in `upper-case` style;
- Words separated by underscore `"_"`;
- Group concepts separated by three underscores `"___"`;
```PHP
ENUMERATION_VALUE
GROUP_NAME___ENUMERATION_VALUE
```
<br><br>



# GLOBAL VARIABLE (AVOID)

> !!! AVOID !!! Prefer a static attribute of a static class.
- Name in `upper-case` style;
- Words separated by underscore `"_"`;
- Group concepts separated by three underscores `"___"`;
```PHP
VARIABLE_NAME
GROUP_NAME___VARIABLE_NAME
```
<br><br>



# FUNCTION (AVOID)

> !!! AVOID !!! Prefer a static method of a static class.
- Name in `camel-case` style;
- Group concepts separated by underscore `"_"`;
```PHP
functionName
groupName_functionName
```



# EXAMPLE

```PHP
<?
	define('DEBUG', true);
	define('CORE_PROFILER___TIME_START', '...');
	define('CORE_PROFILER___MEMORY_START', '...');
	define('CORE_PROFILER___MEMORY_ALLOCATED_START', '...');

	class eMATH_ROUND_BEHAVIOR
	{
		static public $
	}

	class CORE_HELPER___MATH
	{
		static private int $ROUND_FLOAT___PRECISION = 6;

		static public function MAX ($value1, $value2): int
		{

		}
	}



```
