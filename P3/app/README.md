
# Proyecto final de Desarrollo de Software

    

## Requisitos

Se ha configurado una máqina virtual como un servidor apache sobre elq ue se puede
desplegar el proyecto. El máquina virtual se ha configurado sobre la tecnología de Vagrant 
y contiene todas las dependencias y configuraciones necesarias para hacer funcionar el 
proyecto. También contiene la Base de Datos del proyecto.

Los requisitos por tanto se reducen a:

* Vagrant
* VirtualBox
* [Servidor](https://mega.nz/file/Pp0DQZ6b#n9BXFGR2S5YbhjV2boSV_9_5kQaEdXt3Afn8UfURbEQ)

## Instalación

 1. Colocar el archivo package.box en el directorio principal del proyecto. Debe estar al
 nivel que el fichero Vagrantfile
 2. En una terminal, instalamos la máquina virtual: `vagrant box add package.box --name="app_DS"`
 3. Asegurar la conexión entre el sistema anfitrión y la máquina virtual desde VirtualBox:
    `Configuración -> Red -> Adaptador 1 -> Avanzadas -> Cable Conectado`

La máquina virtual ya debería estar correctamente instalada.

## Instrucciones de uso

* Para arrancar la máquina virtual: `vagrant up`

    Con este comando se incia la máquina virtual. El servidor apache escucha en el puerto 
    8081. Se puede acceder a él en localhost:8081 desde cualquier navegador web.

* Para acceder al sistema de la máquina virtual: `vagrant ssh`

    Se accede mediante ssh al sistema. Utilice `exit` para terminar la conexión.
    El sistema anfitrión y la máquina virtual comparten el directorio que contiene al 
    proyecto (/proyecto). Para acceder a él dentro de la máquina virtual tan solo hay 
    que usar `cd /vagrant`

* Para apagar la máquina virtual: `vagrant halt`