# php-iup ![IUP Logo](logo_32x32.png)
<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>.

php-ffi experiment
=========
php7.4 interface to the IUP toolkit for building GUI's.

Description
-----------
[IUP-Toolkit](http://www.tecgraf.puc-rio.br/iup) 

IUP is a multi-platform toolkit for
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
 <img src ="https://raw.github.com/ghostjat/php-iup/master/test/php-iup.png" alt ="php-iup"/>
  <img src ="https://raw.github.com/ghostjat/php-iup/master/test/cbox.png" alt ="cbox"/>
 <img src ="https://raw.github.com/ghostjat/php-iup/master/test/scintilla.png" alt ="Scintilla"/>
<img src="https://raw.github.com/ghostjat/php-iup/master/test/menu.jpg" alt="Hello World IUP Application"/>
</p>

Sample code:

```<?php
require __DIR__.'/../vendor/autoload.php';
use iup\core;
$iup = new core();

$multiText = $iup->text(null);
$vbox = $iup->vbox($multiText);
$iup->setAttribute($multiText, "MULTILINE", "YES");
$iup->setAttribute($multiText, "EXPAND", "YES");
$dlg = $iup->dialog($vbox);
$iup->setAttribute($dlg, 'TITLE', 'php-iup');
$iup->setAttribute($dlg, 'SIZE', 'QUARTERxQUARTER');
$iup->showXY($dlg, $iup::IUP_CENTER, $iup::IUP_CENTER);
$iup->setAttribute($dlg, 'USERSIZE', null);
$iup->mainLoop();
$iup->close();
```
Author
------
Shubham Chaudhary <ghost.jat@gmail.com>
