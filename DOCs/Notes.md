# Debian

## Bug - Frontend Dialog on Docker

Bug:
```
debconf: unable to initialize frontend: Dialog
debconf: (No usable dialog-like program is installed, so the dialog based frontend cannot be used. at /usr/share/perl5/Debconf/FrontEnd/Dialog.pm line 78.)
debconf: falling back to frontend: Readline
debconf: unable to initialize frontend: Readline
debconf: (Can't locate Term/ReadLine.pm in @INC (you may need to install the Term::ReadLine module) (@INC contains: /etc/perl /usr/local/lib/x86_64-linux-gnu/perl/5.32.1 /usr/local/share/perl/5.32.1 /usr/lib/x86_64-linux-gnu/perl5/5.32 /usr/share/perl5 /usr/lib/x86_64-linux-gnu/perl-base /usr/lib/x86_64-linux-gnu/perl/5.32 /usr/share/perl/5.32 /usr/local/lib/site_perl) at /usr/share/perl5/Debconf/FrontEnd/Readline.pm line 7.)
debconf: falling back to frontend: Teletype

Current default time zone: 'Etc/UTC'
Local time is now:      Fri Mar 31 02:54:41 UTC 2023.
Universal Time is now:  Fri Mar 31 02:54:41 UTC 2023.
Run 'dpkg-reconfigure tzdata' if you wish to change it.
```
### Research
Main Topic  
``` https://github.com/phusion/baseimage-docker/issues/58 ```  

Incorrect  
``` https://www.ibm.com/docs/en/informix-servers/12.10?topic=products-term-environment-variable-unix ```  

Correct  
``` https://github.com/moby/moby/issues/27988 ```  

### Solution
Configure debconf frontend to Non Interactive (Just for the Build Process)
```
ARG DEBIAN_FRONTEND noninteractive
```
Configure debconf frontend to Non Interactive (For Ever)
```
ENV DEBIAN_FRONTEND noninteractive
RUN echo 'debconf debconf/frontend select Noninteractive' | sudo debconf-set-selections
```




## Timezone
https://superuser.com/questions/498330/changing-timezone-with-dpkg-reconfigure-tzdata-and-debconf-set-selections
```
RUN echo "tzdata tzdata/Areas select America" | debconf-set-selections
RUN echo "tzdata tzdata/Zones/America select Sao_Paulo" | debconf-set-selections
RUN rm -f /etc/localtime /etc/timezone
RUN dpkg-reconfigure -f noninteractive tzdata
```



## Adm Commands
https://www.tecmint.com/commands-to-collect-system-and-hardware-information-in-linux/

Linux Distribution and Version
cat /etc/os-release | grep PRETTY_NAME | cut -d\" -f2
cat /etc/debian_version
