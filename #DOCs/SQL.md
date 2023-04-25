# Engines
```
ENGINE=InnoDB
ENGINE=MyISAM
```
` InnoDB `: Tables with constant modifications.  
` MyISAM `: Tables with long text content.  
https://pt.stackoverflow.com/questions/41672/quais-as-diferen%C3%A7as-entre-myisam-e-innodb  
https://dba.stackexchange.com/questions/1/what-are-the-main-differences-between-innodb-and-myisam  

## Engines - Cache
https://dba.stackexchange.com/questions/1/what-are-the-main-differences-between-innodb-and-myisam  



# Server - Setup and Initialization
https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_initialize  
https://dev.mysql.com/doc/refman/8.0/en/data-directory-initialization.html  



# Config - Config File and Options List
Config files are required and evaluated in this order:
```
/etc/my.cnf
/etc/mysql/my.cnf
SYSCONFDIR/my.cnf
$MYSQL_HOME/my.cnf
defaults-extra-file
~/.my.cnf
~/.mylogin.cnf
DATADIR/mysqld-auto.cnf
```
Config file syntax:
```
# Comment
; Comment
option # Comment
[group]
opt_name
opt_name=value
opt_name = value
opt_name = 'value'
opt_name = "value"
opt_name = "\b, \t, \n, \r, \\, \s" #backspace, tab, newline, carriage return, backslash, and space
```
Config files include:
```
!include /path/to/dir/file.cnf
!includedir /path/to/dir
```
Config validate:
```
mysqld --validate-config
```
MySQL Config Set Commands:
```
mysql> SET GLOBAL innodb_buffer_pool_in_core_file=OFF;
```
https://dev.mysql.com/doc/refman/8.0/en/server-option-variable-reference.html
https://dev.mysql.com/doc/refman/8.0/en/option-files.html
https://dev.mysql.com/doc/refman/8.0/en/server-configuration-validation.html



# Config - Core
```
basedir = '/etc/.../'
datadir = '/data/mysql/'
# plugin_dir = ''
secure_file_priv = NULL
mysqld_tmpdir = '/logs/mysql/tmp/'

pid_file = '/data/mysql/run.pid'
mysqld_socket = ''

# port = 3306
# user = ''

mysqld_symbolic-links = 0

persisted_globals_load = 0
persist_only_admin_x509_subject = ''
persist_sensitive_variables_in_plaintext = 0

character_set_server = 'utf8mb4'
collation_server = 'utf8mb4_0900_ai_ci'
default_time_zone = 'SYSTEM' # Also accept: '-03:00'

update = 'AUTO'
mysqld_memlock = 0
mysql_firewall_mode = 0
```
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_basedir  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_datadir  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_plugin_dir  
https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_tmpdir  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_secure_file_priv  

https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_pid_file  
https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_socket  

https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_port  
https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_user

https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_symbolic-links  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_persisted_globals_load  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_persist_only_admin_x509_subject
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_persist_sensitive_variables_in_plaintext  
https://dev.mysql.com/doc/refman/8.0/en/persisted-system-variables.html#persisted-system-variables-sensitive  

https://dev.mysql.com/doc/refman/8.0/en/charset-configuration.html  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_character_set_server  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_collation_server  
https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_default-time-zone  
https://dev.mysql.com/doc/refman/8.0/en/time-zone-support.html  

https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_upgrade  
https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_memlock  
https://dev.mysql.com/doc/refman/8.0/en/firewall-reference.html#sysvar_mysql_firewall_mode  



# Conf - Connection
Dev Values:
```
ssl = 0
require_secure_transport = 0

host_cache_size = 0
skip_name_resolve = 1

connect_timeout = 60
wait_timeout = 3600 # 1 Hours
interactive_timeout = 3600 # 1 Hour

max_connections = 100
max_user_connections = 100

max_execution_time = 60000 # 1 Minute

max_connect_errors = 250
connection_control_failed_connections_threshold = 0
connection_control_min_connection_delay = 50
connection_control_max_connection_delay = 1000

# max_allowed_packet = 67108864 # ~67 MB
```
Default Values:
```
ssl = 0
require_secure_transport = 0
host_cache_size = 0
skip_name_resolve = 0
connect_timeout = 10
wait_timeout = 28800 # 8 Hours
interactive_timeout = 28800 # 8 Hours
max_connections = 151
max_user_connections = 0
max_execution_time = 0
max_connect_errors = 100
connection_control_failed_connections_threshold = 3
connection_control_min_connection_delay = 1000 # ms
connection_control_max_connection_delay = 2147483647 # ms
max_allowed_packet = 67108864 # ~67 MB
```
https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_ssl  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_require_secure_transport  

https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_host_cache_size  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_skip_name_resolve  

https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_connect_timeout  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_wait_timeout  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_interactive_timeout  

https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_max_connections  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_max_user_connections  

https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_max_execution_time  

https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_max_connect_errors  
https://dev.mysql.com/doc/refman/8.0/en/connection-control-variables.html#sysvar_connection_control_failed_connections_threshold  
https://dev.mysql.com/doc/refman/8.0/en/connection-control-variables.html#sysvar_connection_control_min_connection_delay  
https://dev.mysql.com/doc/refman/8.0/en/connection-control-variables.html#sysvar_connection_control_max_connection_delay  

https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_max_allowed_packet  



# Config - Authentication
```
authentication_policy = 'mysql_native_password'
check_proxy_users = 0
mysql_native_password_proxy_users = 1

default_password_lifetime = 0
disconnect_on_expired_password = 1

password_history = 0
password_require_current = 0
password_reuse_interval = 0

safe_user_create = 1
```
```
authentication_policy = '*, , '
authentication_policy = 'mysql_native_password, '
authentication_policy = 'mysql_native_password, , '
authentication_policy = 'caching_sha2_password, sha256_password, caching_sha2_password'
default_authentication_plugin = 'mysql_native_password'
default_authentication_plugin = 'sha256_password'
default_authentication_plugin = 'caching_sha2_password'
check_proxy_users = 0
mysql_native_password_proxy_users = 0
password_history = 0
password_require_current = 0
password_reuse_interval = 0
safe_user_create = 0
```
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_authentication_policy  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_default_authentication_plugin  
https://dev.mysql.com/doc/refman/8.0/en/native-pluggable-authentication.html  
https://dev.mysql.com/doc/refman/8.0/en/caching-sha2-pluggable-authentication.html  

https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_default_password_lifetime  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_disconnect_on_expired_password  
https://dev.mysql.com/doc/refman/8.0/en/expired-password-handling.html  

https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_check_proxy_users
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_mysql_native_password_proxy_users

https://dev.mysql.com/doc/refman/8.0/en/password-management.html
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_password_history
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_password_require_current
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_password_reuse_interval

https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_safe-user-create



# Config - Tables
```
# lower_case_table_names = 0 # Windows bugs if set to 0
default_storage_engine = 'InnoDB'
default_tmp_storage_engine = 'InnoDB'
default_table_encryption = 0

mysqld_external_locking = 0
concurrent_insert = 0

flush = 0
flush_time = 0

sql_generate_invisible_primary_key = 0
sql_require_primary_key = 1
```
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_lower_case_table_names  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_default_storage_engine  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_default_tmp_storage_engine  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_default_table_encryption  

https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_external-locking  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_concurrent_insert  

https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_flush  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_flush_time  

https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_sql_generate_invisible_primary_key
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_sql_require_primary_key



# Config - Logs
https://dev.mysql.com/doc/refman/8.0/en/server-logs.html  
https://dev.mysql.com/doc/refman/8.0/en/replication-options-gtids.html#sysvar_gtid_mode  
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_max_error_count  
https://dev.mysql.com/doc/refman/8.0/en/firewall-reference.html#sysvar_mysql_firewall_trace  
https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_skip-stack-trace  
https://dev.mysql.com/doc/refman/8.0/en/debugging-mysql.html  

## Core Dump File
```
core_file = 0
innodb_buffer_pool_in_core_file = 0
```
https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_core-file  
https://dev.mysql.com/doc/refman/8.0/en/innodb-buffer-pool-in-core-file.html  

## Performance Schema
```
performance_schema = 0
```
https://dev.mysql.com/doc/refman/8.0/en/performance-schema-system-variables.html#sysvar_performance_schema

## Audit Log (Plugin)
```
audit_log = 0
audit_log = 1
audit_log_file = '/logs/mysql/audit.log'
```
https://dev.mysql.com/doc/refman/8.0/en/audit-log-reference.html#option_mysqld_audit-log  
https://dev.mysql.com/doc/refman/8.0/en/audit-log-reference.html#sysvar_audit_log_file  

## Binary Log
```
log_bin = 0
log_bin = 1
log_bin = '/logs/mysql/bin/'
log_bin_basename = '/logs/mysql/bin/'
daemon_memcached_enable_binlog = 0
```
https://dev.mysql.com/doc/refman/8.0/en/binary-log.html  
https://dev.mysql.com/doc/refman/8.0/en/replication-options-binary-log.html#sysvar_log_bin  
https://dev.mysql.com/doc/refman/8.0/en/replication-options-binary-log.html#sysvar_log_bin_basename  
https://dev.mysql.com/doc/refman/8.0/en/innodb-parameters.html#sysvar_daemon_memcached_enable_binlog  
https://dev.mysql.com/doc/refman/8.0/en/replication-options.html#sysvar_server_id  
https://dev.mysql.com/doc/refman/8.0/en/replication-options-binary-log.html#sysvar_source_verify_checksum  








# Conf - Events
```
event_scheduler = 'DISABLED'
```
https://dev.mysql.com/doc/refman/8.0/en/events-overview.html
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_event_scheduler


# Conf - Plugins
https://dev.mysql.com/doc/refman/8.0/en/ddl-rewriter.html
https://dev.mysql.com/doc/refman/8.0/en/ddl-rewriter-options.html#option_mysqld_ddl-rewriter
https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_plugin_dir

https://dev.mysql.com/doc/refman/8.0/en/dbug-package.html






# Conf - Learn About

https://dev.mysql.com/doc/refman/8.0/en/server-system-variables.html#sysvar_max_digest_length
https://dev.mysql.com/doc/refman/8.0/en/x-plugin-options-system-variables.html#option_mysqld_mysqlx
https://dev.mysql.com/doc/refman/8.0/en/mysql-cluster-options-variables.html#option_mysqld_ndb-allow-copying-alter-table
https://dev.mysql.com/doc/refman/8.0/en/fulltext-search-ngram.html

https://dev.mysql.com/doc/refman/8.0/en/server-options.html#option_mysqld_sql-mode
https://dev.mysql.com/doc/refman/8.0/en/sql-mode.html
