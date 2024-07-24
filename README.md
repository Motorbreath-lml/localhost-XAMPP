# Pagina principalt de XAMPP
El objetivo de este proyecto es crear una pagina que de informacion sobre los hostnames en Windows 11 especificamente, los virtual host de Apache y de los proyectos que estan en la carpeta htdocs de XAMPP.

Cada carpeta en htdocs es un proyecto, y este puede estar en un virtualhost de apache y tambien en el archivo host de Windows.

Este proyecto esta diseñado para funcionar con XAMPP en Windows 11, por defecto en la carpeta htdocs esta la informacion basica de XAMPP, todos estos archivos se pueden cortar y pegar en una nueva carpeta dentro de htdocs, por ejemplo, la nueva carpeta se puede llamar XAMPP, definir un virtual host en apache y agregar el hostname al archivo hosts de windows, para indicar que `xampp.localhost` sera la direccion en el navegador que nos brinde esta informacion basica sobre XAMPP.

Entonces ahora podemos colocar los archivos index.php y main.js en la carpeta htdocs, cuando entremos a localhost desde el navegador, este nos dara informacion sobre los proyectos que tenemos en XAMPP. Tambien deberiamos agregar su respectivo virtual host y hostname al localhost, los mismo para los nuevos proyectos que generemos, para tener un mejor entorno de desarrollo.