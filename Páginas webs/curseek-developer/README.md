proyecto de buscador de cursos

Instrucciones de Instalación

Clonar el Repositorio:

### Dirígete a la carpeta del Client:
cd Client

### Instala las dependencias:
npm i

### Para ejecutar el cliente:
npm start

El cliente debería ahora estar corriendo en http://localhost:5173 (o el puerto que Vite use por defecto).

Configurar el lado del Servidor:
cd server Instala las dependencias:

npm install

Nota: Asegúrate de tener configurada la conexión a tu base de datos para eso corre mongo compass y agarra la direccion que te dan y la pones en la ruta de de servidor.js y el nombre de la base de datos ponle cursosApp asi te corre como a mi

node servidor.js corres el server http://localhost:3000

# MongoDB:

nombre db: cursosApp

Estructura_

todos los cursos: cursos_ALL
cursos: cursos_UTN
cursos: cursos_UDEMY
usuarios: users
