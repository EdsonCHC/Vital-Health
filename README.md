# Vital Health

La gestión de **servicios de salud en línea** enfrenta desafíos cada vez más complejos. La creciente demanda de los pacientes y los avances tecnológicos impulsan una serie de retos significativos que requieren soluciones innovadoras y flexibles. Además, es esencial reconocer la diversidad de necesidades entre los usuarios, lo que añade una capa adicional de complejidad a la prestación de servicios de salud en línea.

Uno de los principales desafíos radica en la **ineficiencia en la distribución de servicios de salud en línea**. La falta de coordinación entre los diferentes servicios, así como la ausencia de estándares claros, pueden generar obstáculos significativos en el acceso oportuno a la atención médica en línea. Esto puede resultar en retrasos en algunos tratamientos, disgustos del paciente con el servicio y el progreso de enfermedades que lleguen a tener consecuencias en la vida del paciente.

El desarrollo de este proyecto responde de manera integral y global a las diversas necesidades y desafíos que enfrentan los servicios de salud en línea diariamente. Esta iniciativa surge tras una detallada observación de las dificultades comunes que afectan a este sector, siendo la falta de acceso eficiente a la atención médica uno de los problemas más destacados. Es indispensable reconocer que cada persona tiene necesidades específicas, y por tanto, al desarrollar la solución como **_Vital Health_**, se busca proporcionar un sistema adaptable y escalable que pueda satisfacer las demandas particulares de cada individuo. Al hacerlo, se espera no solo mejorar la calidad de la atención y fortalecer la relación entre servicio de salud y pacientes, sino también impulsar la eficiencia operativa y aumentar el compromiso con la salud digital.

La propuesta de solución planteada para abordar la problemática identificada anteriormente se fundamenta en el uso de diversas tecnologías que abarcan tanto el desarrollo de software como el hardware del mismo proyecto.

- Para mas documentación visite [Instructivo](https://docs.google.com/document/d/1zdvTis02II8IlQPbXBZkFJTD4d4K0ZHSfBJH7Vhv7M8/edit?usp=sharing)
- Programador de Tareas [Programador](https://trello.com/b/2sGFh55K/crea-j-2024)

## Comenzado

Antes que nada necesitaras las ultimas versiones de php, composer, node.js en tu computadora para poder ejecutar todos los paquetes.

## Ejecutar el proyecto

Al clonar el proyecto verás una carpeta llamada **"vh"**, debes de estar dentro de ella.

El proximo paso es ejecutar el servidor de vite

    npm run dev
Luego abrimos otra terminal, el servidor de laravel

    php artisan serve

### Errores

Si todo eso no funciona asegurate de estar en la carpeta raiz y terner todas la dependecias actualizadas

## Aspectos Tecnicos
Vital Health tiene la finalidad de mejorar los procesos médicos, ya sea de papeleo, registros,exámenes,consultas por medio de una página web. En los siguientes apartados explicaremos las herramientas empleadas en el desarrollo de la página web.

### Herramientas utilizadas para el desarrollo 

Visual Studio code:

Visual Studio Code es un editor de código fuente ligero, multiplataforma y altamente extensible, desarrollado por Microsoft. Este editor es ampliamente utilizado por desarrolladores debido a su velocidad, facilidad de uso, y la capacidad de personalización a través de una vasta colección de extensiones.
En el contexto del desarrollo, VS Code se emplea como la herramienta principal para la edición y desarrollo del código de Vital Health. Sus características, como la depuración integrada, el control de versiones mediante Git, y el soporte para múltiples lenguajes de programación, lo hicieron el ideal para manejar los diferentes aspectos técnicos del proyecto. Además, su soporte para plugins permitirá integrar herramientas adicionales que faciliten la codificación, como formateadores de código y entornos de desarrollo específicos para las tecnologías utilizadas durante el desarrollo.

Github:
Es una plataforma de desarrollo colaborativo basada en la nube que permite a los desarrolladores alojar, gestionar y revisar el código fuente de proyectos, utilizando el sistema de control de versiones Git. Es una herramienta esencial para la colaboración en equipos de desarrollo, facilitando la integración continua, el seguimiento de cambios, y la gestión de versiones de manera eficiente y organizada.
Este se utilizara se utilizará para almacenar y gestionar por parte del equipo. el cual nos ayuda a tener un historial de actualizaciones en el código de la plataforma. Lo que nos permitió a nosotros como desarrolladores el trabajar de manera colaborativa, realizar revisiones de código y manejar diferentes ramas del proyecto para el correcto desarrollo de las funcionalidades de vital health,  corregir errores sin afectar la estabilidad del código principal. Además, GitHub se puede utilizar para automatizar flujos de trabajo, como la implementación continua y las pruebas automatizadas, garantizando que cada cambio en el código sea probado y validado antes de ser implementado en producción.

Figma:
Figma es una herramienta de diseño colaborativo basada en la nube que permite a equipos de diseño y desarrollo crear, prototipar, y compartir interfaces de usuario (UI) de manera eficiente. Es reconocida por su capacidad para facilitar la colaboración en tiempo real, permitiendo que varios miembros del equipo trabajen simultáneamente en un mismo proyecto desde cualquier ubicación.
Se empleó para el diseño y la creación de los mockups de la interfaz de la plataforma web tanto para pc como dispositivos móviles. Figma nos permitió utilizar los recursos y plantillas de diseño que nos dieron inspiración en varios aspectos de los diseños de interfaces por otro para guiar la implementación del frontend, asegurando la coherencia visual y la correcta integración de los elementos de UI. garantizando que la interfaz del usuario sea intuitiva, accesible, y alineada con los estándares de diseño del proyecto.

Photoshop:
Photoshop es un software de edición y diseño gráfico desarrollado por Adobe, ampliamente utilizado para la manipulación de imágenes, creación de gráficos, y diseño visual. Es una herramienta potente para diseñadores que permite la creación y edición de gráficos de alta calidad, como imágenes, ilustraciones, y composiciones visuales complejas.
En el proyecto, se utilizó para crear y editar elementos visuales que forman parte de la interfaz de usuario (UI) de Vital Health. Siendo mas especifico en el logo y favicon de la página Además, Photoshop permite ajustar detalles visuales como colores, sombras, y texturas, asegurando que los elementos visuales estén optimizados y alineados con la identidad visual de la plataforma. Estos recursos gráficos serán exportados en formatos adecuados y utilizados por los desarrolladores para mejorar la apariencia y la experiencia de usuario del sitio web.

Trello:
Trello es una herramienta de gestión de proyectos basada en la web que utiliza un sistema de tableros, listas y tarjetas para organizar tareas y colaborar en equipo de manera visual y sencilla. Cada tablero representa un proyecto, las listas pueden representar fases del proyecto o categorías de tareas, y las tarjetas individuales representan tareas específicas que pueden incluir descripciones, comentarios, fechas de vencimiento, y adjuntos.
Se implemento para gestionar el desarrollo, actividades (Activas, pendientes) durante el desarrollo y de igual manera nos ayuda a tener un historial de los aspectos que se han desarrollando en la página. Trello facilito el sistema de 
para planificar y rastrear el progreso de tareas, asignar responsabilidades, y coordinar el trabajo de manera efectiva en cada etapa del proyecto, desde la planificación inicial hasta la implementación y el soporte continuo, puede ser gestionada y monitoreada a través de Trello, facilitando la colaboración y asegurando que todas las partes del proyecto se mantengan alineadas y en curso.



## Autores

  - **Billie Thompson** - *Provided README Template* -
    [PurpleBooth](https://github.com/PurpleBooth)
  - **Edson Chavez** - Lead Developer
    [EdsonCHC](https://github.com/EdsonCH)
  - **Alejandro Alvarenga** - Developer
    [Marvel983](https://github.com)
  - **Victor Guevara** - Tester/QA
    [glizzywalk21](https://github.com/glizzywalk21)
  - **Juan Galdamez** - Project Manager
    [Happy162006](https://github.com/Happy162006)
  - **Geovanni Jacinto** - User Experience Designer
    [Geox](https://github.com/Geox)

## Contribuidores 
[contributors](https://github.com/EdsonCHC/Vital-Health/contributors)


## Licencia

Este proyecto está bajo la licencia GNU GENERAL PUBLIC LICENSE [License.md](https://github.com/EdsonCHC/Vital-Health/blob/main/LICENSE)

## Agradecimientos

  - Agradecemos a **Alvarenga Ventura** alias "Amañenga" por su constante desempeño y participación dentro del proyecto
 
