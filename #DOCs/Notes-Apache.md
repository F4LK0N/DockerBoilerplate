# Error Log
```
LogLevel error
ErrorLogFormat ""
ErrorLog "${HTTPD_LOGS}/errors.log"
```

### LogLevel:  
Available:  
``` emerg/alert/crit/error/warn/notice/info/debug/trace1/.../trace8 ```  
Production:  
``` LogLevel error ```  
Development:  
``` LogLevel warn ```  
Debug All:  
``` LogLevel trace8 ```  
Debug Module:  
``` LogLevel warn rewrite:trace8 ```  

### ErrorLogFormat
| Modified Token	| Meaning
|-|-
| %-{Referer}i	| Logs a - if Referer is not set.
| %+{Referer}i	| Omits the entire line if Referer is not set.
| %4{Referer}i	| Logs the Referer only if the log message severity is higher than 4.

| Format String	| Description
|-|-
| %%	   | The percent sign
| %a	   | Client IP address and port of the request
| %{c}a	   | Underlying peer IP address and port of the connection (see the mod_remoteip module)
| %A	   | Local IP-address and port
| %{name}e | Request environment variable name
| %E	   | APR/OS error status code and string
| %F	   | Source file name and line number of the log call
| %{name}i | Request header name
| %k	   | Number of keep-alive requests on this connection
| %l	   | Log level of the message
| %L	   | Log ID of the request
| %{c}L	   | Log ID of the connection
| %{C}L	   | Log ID of the connection if used in connection scope, empty otherwise
| %m	   | Name of the module logging the message
| %M	   | The actual log message
| %{name}n | Request note name
| %P	   | Process ID of current process
| %T	   | Thread ID of current thread
| %{g}T	   | System unique thread ID of current thread (the same ID as displayed by e.g. top; currently Linux only)
| %t	   | The current time
| %{u}t	   | The current time including micro-seconds
| %{cu}t   | The current time in compact ISO 8601 format, including micro-seconds
| %v	   | The canonical ServerName of the current server.
| %V	   | The server name of the server serving the request according to the UseCanonicalName setting.
| \n       | New Line
| \t       | Tab
| \ "\ "   | (backslash space) Non-field delimiting space
| % "% "   | (percent space) Field delimiter (no output)

### Reference
``` https://httpd.apache.org/docs/2.4/mod/core.html#loglevel ```  
``` https://httpd.apache.org/docs/2.4/mod/core.html#errorlogformat ```  
``` https://httpd.apache.org/docs/2.4/mod/core.html#errorlog ```  
``` https://httpd.apache.org/docs/2.4/logs.htm ```  
``` https://httpd.apache.org/docs/2.4/mod/mod_log_config.html ```  
``` https://httpd.apache.org/docs/2.4/expr.html ```  
``` https://man7.org/linux/man-pages/man3/strftime.3.html ```  


# Options
https://httpd.apache.org/docs/2.4/mod/core.html#options




# ModRewrite Debug
Debug Apache Rewrite module.  

### Solution
``` /etc/apache2/httpd.conf ```  
```
LogLevel warn rewrite:trace8
```

### Reference
``` https://stackoverflow.com/questions/9632852/how-to-debug-apache-mod-rewrite ```  





https://github.com/yahoo/tunitas-apanolio/blob/master/tests/httpd/conf.modules.d/minimal.conf
