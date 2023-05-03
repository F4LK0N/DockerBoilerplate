# WSL - CONFIG
<https://learn.microsoft.com/en-us/windows/wsl/filesystems>
<https://learn.microsoft.com/en-us/windows/wsl/wsl-config>
<https://devblogs.microsoft.com/commandline/chmod-chown-wsl-improvements/>
<https://learn.microsoft.com/en-us/windows/wsl/wsl-config#per-distribution-configuration-options-with-wslconf>
<https://learn.microsoft.com/en-us/windows/wsl/wsl-config#configuration-settings-for-wslconf>
<https://learn.microsoft.com/en-us/windows/wsl/case-sensitivity>

.wslconfig
```ini
  [wsl2]
  #kernel=
  memory=2GB
  processors=2
  localhostForwarding=true
  #kernelCommandLine=""
  safeMode=false
  swap=0
  #swapFile=%USERPROFILE%\\AppData\\Local\\Temp\\swap.vhdx
  #pageReporting=false #Unknown key
  guiApplications=false
  debugConsole=false
  nestedVirtualization=false
```

`
  sudo mount -t drvfs C: /mnt/c -o metadata,uid=1000,gid=1000,umask=22,fmask=111
  sudo mount -t drvfs C: /mnt/c -o metadata,uid=1001,gid=1001,umask=22,fmask=111
`

/etc/wsl.conf
```ini
  # Automatically mount Windows drive when the distribution is launched
  [automount]
  # Set to true will automount fixed drives (C:/ or D:/) with DrvFs under the root directory set above. Set to false means drives won't be mounted automatically, but need to be mounted manually or with fstab.
  enabled = true
  # Sets the directory where fixed drives will be automatically mounted. This example changes the mount location, so your C-drive would be /c, rather than the default /mnt/c. 
  root = /
  # DrvFs-specific options can be specified.  
  #options = "metadata,uid=1000,gid=1000,umask=000,fmask=000,dmask=000,case=off"
  options = "uid=1000,gid=1000,umask=000,fmask=000,dmask=000"
  # Sets the `/etc/fstab` file to be processed when a WSL distribution is launched.
  mountFsTab = true
  # Network host settings that enable the DNS server used by WSL 2. This example changes the hostname, sets generateHosts to false, preventing WSL from the default behavior of auto-generating /etc/hosts, and sets generateResolvConf to false, preventing WSL from auto-generating /etc/resolv.conf, so that you can create your own (ie. nameserver 1.1.1.1).
  [network]
  hostname = DemoHost
  generateHosts = false
  generateResolvConf = false
  # Set whether WSL supports interop process like launching Windows apps and adding path variables. Setting these to false will block the launch of Windows processes and block adding $PATH environment variables.
  [interop]
  enabled = false
  appendWindowsPath = false
  # Set the user when launching a distribution with WSL.
  [user]
  default = DemoUser
  # Set a command to run when a new WSL instance launches. This example starts the Docker container service.
  [boot]
  command = service docker start
```

Docker Desktop Default
```ini
  [automount]
  root = /mnt/host
  crossDistro = true
  options = "metadata"
```
