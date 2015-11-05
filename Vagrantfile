# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure(2) do |config|

  config.vm.box = "scotch/box"


  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  config.vm.network "private_network", ip: "192.168.33.10"


  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  config.vm.synced_folder ".", "/var/www", :mount_option => ["dmode=777,fmode=777"]



  # Enable provisioning with a shell script. Additional provisioners such as
  # Puppet, Chef, Ansible, Salt, and Docker are also available. Please see the
  # documentation for more information about their specific syntax and use.
  config.vm.provision "shell", inline: <<-SHELL
    mysql -u root -proot -e "CREATE DATABASE payment CHARACTER SET utf8"
    mysql -u root -proot -e "grant all privileges on payment.* to 'payment' identified by 'payment' with grant option"
    mysql -u root -proot -e "flush privileges"
    echo '[mysqld]
bind-address = 0.0.0.0
' > /etc/mysql/conf.d/bind-address.cnf
    service mysql restart
    SHELL

  config.vm.provision "auto-cd", type:"shell", inline: <<-SHELL
    echo "cd /var/www" >> /home/vagrant/.bashrc
  SHELL
end
