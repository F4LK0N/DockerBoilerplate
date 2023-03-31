# Bash - Frontend Dialog on Docker
This bug occours when installing some packages:
```
debconf: unable to initialize frontend: Dialog
debconf: (No usable dialog-like program is installed, so the dialog based frontend cannot be used. at /usr/share/perl5/Debconf/FrontEnd/Dialog.pm line 78.)
debconf: falling back to frontend: Readline
debconf: unable to initialize frontend: Readline
debconf: (Can't locate Term/ReadLine.pm in @INC (you may need to install the Term::ReadLine module) (@INC contains: /etc/perl /usr/local/lib/x86_64-linux-gnu/perl/5.32.1 /usr/local/share/perl/5.32.1 /usr/lib/x86_64-linux-gnu/perl5/5.32 /usr/share/perl5 /usr/lib/x86_64-linux-gnu/perl-base /usr/lib/x86_64-linux-gnu/perl/5.32 /usr/share/perl/5.32 /usr/local/lib/site_perl) at /usr/share/perl5/Debconf/FrontEnd/Readline.pm line 7.)
debconf: falling back to frontend: Teletype
```
## Research
Main Topic:  
``` https://github.com/phusion/baseimage-docker/issues/58 ```  

Incorrect:  
``` https://www.ibm.com/docs/en/informix-servers/12.10?topic=products-term-environment-variable-unix ```  

Correct:  
``` https://github.com/moby/moby/issues/27988 ```  

## Solution
Configure debconf frontend to Non Interactive (Just for the Build Process)
```
ARG DEBIAN_FRONTEND noninteractive
```
Configure debconf frontend to Non Interactive (For Ever)
```
ENV DEBIAN_FRONTEND noninteractive
RUN echo 'debconf debconf/frontend select Noninteractive' | sudo debconf-set-selections
```

.  
.  
.  

# Bash - Behavior
Configure bash to break and return errors properlly.

```
https://explainshell.com/explain?cmd=set+-eux
```
## Solution
Set this piece of code as the first command at every RUN on Dockerfile
```
set -eux
```

.  
.  
.  

# Timezone
``` https://superuser.com/questions/498330/changing-timezone-with-dpkg-reconfigure-tzdata-and-debconf-set-selections ```
```
RUN echo "tzdata tzdata/Areas select America" | debconf-set-selections
RUN echo "tzdata tzdata/Zones/America select Sao_Paulo" | debconf-set-selections
RUN rm -f /etc/localtime /etc/timezone
RUN dpkg-reconfigure -f noninteractive tzdata
```

.  
.  
.  

# Adm Commands
System Info:  
``` https://www.tecmint.com/commands-to-collect-system-and-hardware-information-in-linux/ ```  

Users:  
``` https://www.redhat.com/sysadmin/linux-commands-manage-users ```  

Groups  
``` https://www.redhat.com/sysadmin/linux-commands-manage-groups ```  

Processes  
``` https://www.digitalocean.com/community/tutorials/process-management-in-linux ```  

Services:  
``` https://www.techtarget.com/searchnetworking/tip/20-systemctl-commands-for-system-and-service-management ```  

Network:  
``` https://mindmajix.com/linux-networking-commands-best-examples ```

Ports:  
``` https://www.cyberciti.biz/faq/unix-linux-check-if-port-is-in-use-command/ ```

Memory:  
``` https://phoenixnap.com/kb/linux-commands-check-memory-usage ```

Storage:  
``` https://www.digitalocean.com/community/tutorials/how-to-perform-basic-administration-tasks-for-storage-devices-in-linux ```  

.  
.  
.  


# ANSI Art:

Font: Big
```
  ______              _        _  __   ____    _   _                _____    __  __ 
 |  ____|     /\     | |      | |/ /  / __ \  | \ | |       /\     |  __ \  |  \/  |
 | |__       /  \    | |      | ' /  | |  | | |  \| |      /  \    | |  | | | \  / |
 |  __|     / /\ \   | |      |  <   | |  | | | . ` |     / /\ \   | |  | | | |\/| |
 | |       / ____ \  | |____  | . \  | |__| | | |\  |    / ____ \  | |__| | | |  | |
 |_|      /_/    \_\ |______| |_|\_\  \____/  |_| \_|   /_/    \_\ |_____/  |_|  |_|
```

Font: Isometric1
```
     /\  \         /\  \         /\__\     /\__\         /\  \         /\__\                  /\  \         /\  \         /\__\    
    /::\  \       /::\  \       /:/  /    /:/  /        /::\  \       /::|  |                /::\  \       /::\  \       /::|  |   
   /:/\:\  \     /:/\:\  \     /:/  /    /:/__/        /:/\:\  \     /:|:|  |               /:/\:\  \     /:/\:\  \     /:|:|  |   
  /::\~\:\  \   /::\~\:\  \   /:/  /    /::\__\____   /:/  \:\  \   /:/|:|  |__            /::\~\:\  \   /:/  \:\__\   /:/|:|__|__ 
 /:/\:\ \:\__\ /:/\:\ \:\__\ /:/__/    /:/\:::::\__\ /:/__/ \:\__\ /:/ |:| /\__\          /:/\:\ \:\__\ /:/__/ \:|__| /:/ |::::\__\
 \/__\:\ \/__/ \/__\:\/:/  / \:\  \    \/_|:|~~|~    \:\  \ /:/  / \/__|:|/:/  /          \/__\:\/:/  / \:\  \ /:/  / \/__/~~/:/  /
      \:\__\        \::/  /   \:\  \      |:|  |      \:\  /:/  /      |:/:/  /                \::/  /   \:\  /:/  /        /:/  / 
       \/__/        /:/  /     \:\  \     |:|  |       \:\/:/  /       |::/  /                 /:/  /     \:\/:/  /        /:/  /  
                   /:/  /       \:\__\    |:|  |        \::/  /        /:/  /                 /:/  /       \::/__/        /:/  /   
                   \/__/         \/__/     \|__|         \/__/         \/__/                  \/__/         ~~            \/__/    
```

Font: Slant
```
    ______    ___     __     __ __   ____     _   __           ___     ____     __  ___
   / ____/   /   |   / /    / //_/  / __ \   / | / /          /   |   / __ \   /  |/  /
  / /_      / /| |  / /    / ,<    / / / /  /  |/ /          / /| |  / / / /  / /|_/ / 
 / __/     / ___ | / /___ / /| |  / /_/ /  / /|  /          / ___ | / /_/ /  / /  / /  
/_/       /_/  |_|/_____//_/ |_|  \____/  /_/ |_/          /_/  |_|/_____/  /_/  /_/   
```
