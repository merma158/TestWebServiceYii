TestWebServiceYii
=================

Aplicación de prueba para el aprendizaje y manejo de WebService con SOAP y Yii Framework. 
Con uso de Boostrap Extensions

Descripción funcional:
Ésta App se comunica con otra implementada con moodle. por lo que es necesario
implementar la App en moodle para visualizar toda la funcionalidad. 
De ésta App: lista y agrega usuarios y roles, en caso de que usuario sea insertado
desde App moodle puede mostrar información detallada de usuario proveniente de 
App moodle.

Requerimientos:

PHP5+

Yii Framework 1.1.13+

Configuración en Servidor HTTP:

    .- Habilitar SOAP
    
    .- SQLite 3


Archivos Importates:

/protected/models/User.php

/protected/models/Utils.php

/protected/controllers/UserController.php

/protected/controllers/WsuserController.php

/protected/config/main.php

/protected/themes/kongoon/views/layouts/main.php

Get Start | Poner en marcha

.- Descargar

.- Descomprimir en Directorio Raíz configurado en HTTP Server
