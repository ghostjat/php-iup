# php-iup ![IUP Logo](logo_32x32.png)

php-ffi experiment
=========
php7.4 interface to the IUP toolkit for building GUI's.

Description
-----------
[IUP][2] is a multi-platform toolkit for
building graphical user interfaces. IUP's purpose is to allow a program
source code to be compiled in different systems without any modification.
Its main advantages are:

* It offers a simple API.
* High performance, due to the fact that it uses native interface elements.
* Fast learning by the user, due to the simplicity of its API.

Synopsis
--------
WARNING:  
This module is in its early stages and should be considered a Work in Progress.
The interface is not final and may change in the future.  

Sample GUI:

<p align="center">
 <img src ="https://raw.github.com/ghostjat/php-iup/master/examples/php-iup.png" alt ="php-iup"/>
  <img src ="https://raw.github.com/ghostjat/php-iup/master/examples/cbox.png" alt ="cbox"/>
 <img src ="https://raw.github.com/ghostjat/php-iup/master/examples/scintilla.png" alt ="Scintilla"/>
<img src="https://raw.github.com/ghostjat/php-iup/master/examples/menu.jpg" alt="Hello World IUP Application"/>
</p>

Sample code:

```<?php
require __DIR__.'/../vendor/autoload.php';
use iup\core;
$iup = new core();
$iup->init();
$multiText = $iup->iupText(null);
$vbox = $iup->iupVbox($multiText);
$iup->iupSetAttribute($multiText, "MULTILINE", "YES");
$iup->iupSetAttribute($multiText, "EXPAND", "YES");
$dlg = $iup->iupDialog($vbox);
$iup->iupSetAttribute($dlg, 'TITLE', 'php-iup');
$iup->iupSetAttribute($dlg, 'SIZE', 'QUARTERxQUARTER');
$iup->iupShowXY($dlg, $iup::IUP_CENTER, $iup::IUP_CENTER);
$iup->iupSetAttribute($dlg, 'USERSIZE', null);
$iup->iupMainLoop();
$iup->close();
```
Author
------
Shubham Chaudhary <ghost.jat@gmail.com>
