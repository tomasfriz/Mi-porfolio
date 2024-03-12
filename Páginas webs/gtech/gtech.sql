-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2023 a las 16:10:30
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gtech`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Placa de video'),
(2, 'Procesador'),
(3, 'Memoria RAM'),
(4, 'Teclado'),
(7, 'Almacenamiento'),
(8, 'Fuente de alimentación'),
(9, 'Mouse');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(10) UNSIGNED NOT NULL,
  `marca` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `marca`) VALUES
(1, 'Nvidia'),
(2, 'AMD'),
(3, 'Intel'),
(12, 'Sin marca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_vendedor` int(10) UNSIGNED NOT NULL,
  `id_marca` int(10) UNSIGNED DEFAULT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `imagen_small` varchar(256) NOT NULL,
  `imagen_big` varchar(256) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_vendedor`, `id_marca`, `id_categoria`, `nombre`, `imagen_small`, `imagen_big`, `precio`, `descripcion`) VALUES
(1, 2, 3, 2, 'Intel Core I9-12900K BX8071512900K de 16 núcleos y 5.2GHz de frecuencia con gráfica integrada', '1649b71f439311.png', '1649b71f4393ef.png', 470600.00, 'Mejora el rendimiento de tu computadora con el Procesador Intel Core i9-12900K, ideal para aquellos que buscan un alto rendimiento en sus tareas diarias y en juegos. Con sus 16 núcleos y 24 hilos, este procesador te permitirá realizar múltiples tareas de manera eficiente y rápida. Gracias a su arquitectura x86-64 y litografía de 7 nm, disfrutarás de un menor consumo de energía y mayor rendimiento en comparación con modelos anteriores.\r\n\r\nEl Intel Core i9-12900K es compatible con memorias RAM DDR4 y DDR5, lo que te brinda la flexibilidad de elegir la mejor opción para tus necesidades y garantiza una mayor velocidad en la transferencia de datos. Además, su frecuencia máxima de reloj de 5.2 GHz te asegura un rendimiento óptimo en todo momento.\r\n\r\nEste procesador cuenta con gráficos integrados Intel HD Graphics 770, lo que te permitirá disfrutar de tus juegos y aplicaciones multimedia sin la necesidad de una tarjeta gráfica dedicada. Además, su tecnología hyper-threading te brinda un mejor rendimiento en aplicaciones que requieren un alto nivel de procesamiento.\r\n\r\nCon una potencia de diseño térmico de 125 W, el Intel Core i9-12900K garantiza un funcionamiento estable y eficiente, incluso en situaciones de alta demanda. No esperes más para llevar tu computadora al siguiente nivel con este potente procesador de 12ª generación, lanzado en 2021.'),
(4, 1, 12, 3, 'RAM color verde 8GB 1 Crucial CB8GS2666', '1649e7ac3610c0.png', '1649e7ac3611a7.png', 2000.00, 'Una actualización de memoria es una de las formas más rápidas, fáciles y económicas de mejorar de manera inmediata el rendimiento de tu computadora. Ya sea para un ordenador portátil, de escritorio o una estación de trabajo que funciona lento y relentiza tus actividades, instalar más memoria tomará solo unos minutos y te brindará soluciones inmediatas y duraderas a corto, mediano y largo plazo. Acelerá y extendé la vida útil del sistema y aprovechá la capacidad de respuesta que te da para trabajar de manera simple y confortable. No lo dudes más, la memoria Crucial es una de las formas más accesibles para aumentar de manera fácil la capacidad multitarea de tu computadora.\r\n\r\nPotenciá tu PC\r\nCon su tecnología DDR4, mejorará el desempeño de tu equipo, ya que opera en 3 y 4 canales, generando mayor fluidez y velocidad en la transferencia de datos. ¡Optimizá al máximo el rendimiento de tu computadora!\r\n\r\nTu equipo como nuevo\r\nEsta memoria de formato SODIMM es ideal para tu Notebooks. ¡Instalala y comenzá a disfrutar de un óptimo funcionamiento!\r\n\r\nVelocidad para exigentes\r\nSi sos fanático de los juegos en línea o la usás para trabajar con programas o aplicaciones pesadas, esta memoria es para vos. Gracias a su velocidad de 2666 MHz, podrás disfrutar de un alto rendimiento y hacer tus trabajos de manera rápida y efectiva.'),
(61, 1, 2, 1, 'RX 550 PHANTOM G R RX550 2G 2GB', '1649b721c0fb3e.png', '1649b721c0fc49.png', 74410.00, 'Este componente electrónico procesa la información que llega al dispositivo y los transforma en imágenes o videos para mostrarla visualmente. Es ideal para trabajar con aplicaciones gráficas ya que permite obtener imágenes más nítidas.\r\n\r\nAMD es un fabricante estadounidense de placas de video, por su tecnología se ha destacado en crear procesadores de alta gama que permiten un excelente funcionamiento del motor gráfico de tu computadora.\r\n\r\nEn el menor tiempo posible\r\nCon una velocidad de memoria de 6000 MHz los datos del procesador central se van a traducir en información comprensible en tan solo un abrir y cerrar de ojos; decodificará tantos ciclos por segundo que hará más efectiva la transmisión de datos a otros componentes. Con esta cualidad, el equipo ganará agilidad y eficiencia.\r\n\r\nVelocidad en cada lectura\r\nComo cuenta con 512 núcleos, los cálculos para el procesamiento de gráficos se realizarán de forma simultánea logrando un resultado óptimo del trabajo de la placa. Esto le permitirá ejecutar lecturas dispersas y rápidas de y hacia la GPU.\r\n\r\nCalidad de imagen\r\nCriterio fundamental a la hora de elegir una placa de video, su resolución de 5120x2880 no te defraudará. La decodificación de los píxeles en tu pantalla te harán ver hasta los detalles más ínfimos en cada ilustración.'),
(62, 1, 12, 7, 'Disco sólido interno Western Digital WD Green WDS480G2G0A 480GB verde', '1649b731717bb0.png', '1649b731717ca2.png', 12399.00, 'Western Digital es una marca de renombre mundial en almacenamiento de datos con la cual podés crear, experimentar y guardar contenidos a través de una amplia gama de dispositivos. La alta seguridad y rendimiento que brindan sus unidades la convierten en una de las empresas más elegidas del mercado.\r\nEl WD Green WDS240G3G0A está adaptado para que puedas acceder de forma rápida a tus documentos digitales gracias a su tecnología en estado sólido.\r\n\r\nMás velocidad a tu alcance\r\nEste producto posee una interfaz SATA III que se encarga de transferir datos con la placa madre de tu computadora. Es de gran importancia y con su velocidad de envío de información mejora el rendimiento. Vas a poder cargar todo tipo de archivos en tu PC con rapidez.'),
(63, 2, 2, 2, 'AMD Athlon 3000G YD3000C6FHBOX de 2 núcleos y 3.5GHz de frecuencia con gráfica integrada', '1649b7387179e5.png', '1649b738717adf.png', 54990.00, 'Clave en el rendimiento de tu computadora de escritorio, ya no tenés que pensar en cómo distribuir el tiempo y acciones porque ahora las tareas en simultáneo son posibles.\r\nAMD cuenta con un catálogo de productos que se adaptan a los requerimientos de todo tipo de usuarios: juegos en línea, edición a gran escala, contenido en múltiples plataformas y más.\r\n\r\nNúcleos: el corazón del procesador\r\nEn este producto, encontrarás los núcleos, que son los encargados de ejecutar las instrucciones y actividades que le asignás a tu dispositivo. Estos tienen relación directa con dos elementos: los hilos y el modelo. Por lo tanto, a la hora de elegir un procesador, es importante que valores los tres en su conjunto.\r\n\r\nMáxima potencia\r\nAl estar desbloqueado, podrás realizar overclocking y así aumentar la frecuencia de funcionamiento y optimizar el rendimiento de tu equipo. Personalizalo a tu gusto y disfrutá de tus videojuegos o hacé que la renderización de imágenes sea más ágil. ¡Descubrí el abanico de posibilidades que esta función te ofrece!'),
(64, 2, 2, 1, 'Placa de video AMD Radeon RX 500 Series RX 580 8GB', '1649b73d238550.png', '1649b73d2386c7.png', 174999.00, 'Este componente electrónico procesa la información que llega al dispositivo y los transforma en imágenes o videos para mostrarla visualmente. Es ideal para trabajar con aplicaciones gráficas ya que permite obtener imágenes más nítidas.\r\n\r\nAMD es un fabricante estadounidense de placas de video, por su tecnología se ha destacado en crear procesadores de alta gama que permiten un excelente funcionamiento del motor gráfico de tu computadora.\r\n\r\nVelocidad en cada lectura\r\nComo cuenta con 2304 núcleos, los cálculos para el procesamiento de gráficos se realizarán de forma simultánea logrando un resultado óptimo del trabajo de la placa. Esto le permitirá ejecutar lecturas dispersas y rápidas de y hacia la GPU.'),
(65, 1, 12, 8, 'Fuente de alimentación para PC Redragon RPGS GC-PS002 600W negra 100V/240V', '1649b742ff1875.png', '1649b742ff1948.png', 33890.00, 'Con la fuente de alimentación Redragon GC-PS002 podrás asegurar la corriente continua y estable de tu computadora de escritorio y optimizar el funcionamiento de sus componentes.\r\n\r\nControl de temperatura\r\nA través de su sistema de refrigeración, podrás mantener la temperatura ideal de sus componentes y evitar su sobrecalentamiento.\r\n\r\nSin ruido ni distracciones\r\nDebido a su funcionamiento silencioso, tu equipo operará minimizando el nivel de ruido, para que tu jornada sea más agradable.\r\n\r\nProtección asegurada\r\nEl sistema de protección OPP realiza un monitoreo constante de la corriente y, en caso de detectar una sobrecarga de energía, apaga el dispositivo para evitar daños.'),
(66, 1, 12, 7, 'Disco sólido interno Kingston SA400S37/960G 960GB', '1649b780fb5f62.png', '1649b780fb609d.png', 28268.00, 'Considerado un dispositivo de alto rendimiento, la unidad en estado sólido A400 de Kingston está diseñada para las personas más exigentes. Mejora de forma notable la capacidad de respuesta de su sistema, ya que alcanza velocidades de lectura/escritura de hasta 500MB/seg y 450MB/seg. Por ende, es 10 veces más rápido que un disco duro tradicional.\r\nAl estar compuesta por una memoria flash es silenciosa y posee pocas probabilidades de tener fallas.\r\n\r\nIrrompible\r\nAdemás de su funcionalidad y soporte, la importancia de los discos de almacenamiento también radica en su calidad y resistencia. Despreocupate y disfrutá de la durabilidad de este producto debido a su capacidad de absorber y resistir fuertes impactos.'),
(67, 1, 1, 1, 'RTX 2060 SUPER GEFORCE RTX 2060 SUPER VENTUS GP OC OC Edition 8GB', '1649b78526910f.png', '1649b7852691ed.png', 235000.00, 'Este componente electrónico procesa la información que llega al dispositivo y los transforma en imágenes o videos para mostrarla visualmente. Es ideal para trabajar con aplicaciones gráficas ya que permite obtener imágenes más nítidas.\r\n\r\nNvidia es el fabricante líder de placas de video; su calidad asegura una experiencia positiva en el desarrollo del motor gráfico de tu computadora. Además, sus procesadores usan tecnología de punta para que puedas disfrutar de un producto veloz y duradero.\r\n\r\nVelocidad en cada lectura\r\nComo cuenta con 2176 núcleos, los cálculos para el procesamiento de gráficos se realizarán de forma simultánea logrando un resultado óptimo del trabajo de la placa. Esto le permitirá ejecutar lecturas dispersas y rápidas de y hacia la GPU.\r\n\r\nCalidad de imagen\r\nCriterio fundamental a la hora de elegir una placa de video, su resolución de 7680x4320 no te defraudará. La decodificación de los píxeles en tu pantalla te harán ver hasta los detalles más ínfimos en cada ilustración.'),
(68, 2, 12, 3, 'RAM Fury Beast DDR4 gamer color negro 8GB 1 Kingston KF432C16BB/8', '1649b789dd885f.png', '1649b789dd899c.png', 11280.00, 'Si tu computadora funciona con lentitud, si un programa no responde o no se carga, lo más probable es que se trate de un problema de memoria. Estos son posibles indicios de un rendimiento defectuoso en el día a día de tus tareas. Por ello, contar con una memoria Kingston -sinónimo de trayectoria y excelencia- mejorará la productividad de tu equipo: las páginas se cargarán más rápido y la ejecución de nuevas aplicaciones resultará más ágil y simple.\r\n\r\nPotenciá tu PC\r\nCon su tecnología DDR4, mejorará el desempeño de tu equipo, ya que aumentará la fluidez y la velocidad en la transferencia de datos ¡Optimizá al máximo el rendimiento de tu computadora y reducí el consumo energético!\r\n\r\nTu equipo como nuevo\r\nEsta memoria es ideal para tu Computadoras de escritorio. ¡Instalala y comenzá a disfrutar de un óptimo funcionamiento!'),
(69, 1, 3, 2, 'Intel Core i3-10100 BX8070110100 de 4 núcleos y 4.3GHz de frecuencia con gráfica integrada', '1649b79074111b.png', '1649b790741255.png', 82499.00, 'Productividad y entretenimiento, todo disponible en tu computadora de escritorio. La superioridad tecnológica de INTEL es un beneficio para todo tipo de profesionales. Asegura el mejor rendimiento de las aplicaciones, de la transferencia de datos y la conexión con otros elementos tecnológicos.\r\n\r\nNúcleos: el corazón del procesador\r\nEn este producto, encontrarás los núcleos, que son los encargados de ejecutar las instrucciones y actividades que le asignás a tu dispositivo. Estos tienen relación directa con dos elementos: los hilos y el modelo. Por lo tanto, a la hora de elegir un procesador, es importante que valores los tres en su conjunto.'),
(70, 1, 2, 2, 'AMD Ryzen Threadripper 3970X 100-100000011WOF de 32 núcleos y 4.5GHz de frecuencia', '1649b793c17939.png', '1649b793c17a53.png', 1190000.00, 'Mejora el rendimiento de tu computadora con el Procesador AMD Ryzen Threadripper 3970X, ideal para aquellos que buscan potencia y eficiencia en sus tareas diarias y proyectos profesionales. Con sus 32 núcleos y 64 hilos de CPU, este procesador te permitirá realizar múltiples tareas de manera simultánea y sin esfuerzo. Gracias a su arquitectura x86-64, disfrutarás de una mayor compatibilidad con aplicaciones y sistemas operativos.\r\n\r\nLa frecuencia mínima de reloj de 3.7 GHz y la máxima de 4.5 GHz aseguran un rendimiento óptimo en todo momento. Además, su caché de 128 MB te permitirá acceder rápidamente a los datos más utilizados, mejorando la velocidad de respuesta de tu equipo.\r\n\r\nEl AMD Ryzen Threadripper 3970X es compatible con memorias RAM DDR4, lo que te brinda mayor velocidad y eficiencia en la transferencia de datos. Su potencia de diseño térmico de 280 W garantiza un funcionamiento estable y seguro, incluso en situaciones de alta demanda.\r\n\r\nEste procesador de 3° generación es compatible con el zócalo sTRX4, lo que te permitirá actualizar tu equipo sin problemas. Además, su lanzamiento en 2019 asegura que estás adquiriendo un producto actualizado y con tecnología de vanguardia.\r\n\r\nNo esperes más para llevar tu computadora al siguiente nivel con el Procesador AMD Ryzen Threadripper 3970X.'),
(71, 1, 12, 7, 'Disco sólido interno Gigabyte GP-GSTFS31120GNTD 120GB negro', '1649b7990f1cdc.png', '1649b7990f1e08.png', 10999.00, 'Con la unidad en estado sólido Gigabyte vas a incrementar la capacidad de respuesta de tu equipo. Gracias a esta tecnología podrás invertir en velocidad y eficiencia para el inicio, la carga y la transferencia de datos.\r\n\r\nIrrompible\r\nAdemás de su funcionalidad y soporte, la importancia de los discos de almacenamiento también radica en su calidad y resistencia. Despreocupate y disfrutá de la durabilidad de este producto debido a su capacidad de absorber y resistir fuertes impactos.\r\n\r\nMás velocidad a tu alcance\r\nEste producto posee una interfaz SATA III que se encarga de transferir datos con la placa madre de tu computadora. Es de gran importancia y con su velocidad de envío de información mejora el rendimiento. Vas a poder cargar todo tipo de archivos en tu PC con rapidez.'),
(72, 1, 1, 1, 'Placa de video Nvidia  GeForce RTX 30 Series RTX 3090 24GB', '1649b7a1561c51.png', '1649b7a1561d71.png', 869089.00, 'Este componente electrónico procesa la información que llega al dispositivo y los transforma en imágenes o videos para mostrarla visualmente. Es ideal para trabajar con aplicaciones gráficas ya que permite obtener imágenes más nítidas.\r\n\r\nNvidia es el fabricante líder de placas de video; su calidad asegura una experiencia positiva en el desarrollo del motor gráfico de tu computadora. Además, sus procesadores usan tecnología de punta para que puedas disfrutar de un producto veloz y duradero.\r\n\r\nVelocidad en cada lectura\r\nCuenta con 10496 núcleos, por lo que la interfaz de la placa será algo sorprendente. Este tipo de estructura es apropiado para el procesamiento de tecnologías más complejas y modernas caracterizadas por grandes volúmenes de datos.\r\n\r\nCalidad de imagen\r\nCriterio fundamental a la hora de elegir una placa de video, su resolución de 7680x4320 no te defraudará. La decodificación de los píxeles en tu pantalla te harán ver hasta los detalles más ínfimos en cada ilustración.'),
(73, 2, 12, 3, 'RAM Fury Beast DDR4 RGB gamer color rojo 16GB 1 Kingston KF432C16BBA/16', '1649b7a762a31b.png', '1649b7a762a521.png', 15299.00, 'Si tu computadora funciona con lentitud, si un programa no responde o no se carga, lo más probable es que se trate de un problema de memoria. Estos son posibles indicios de un rendimiento defectuoso en el día a día de tus tareas. Por ello, contar con una memoria Kingston -sinónimo de trayectoria y excelencia- mejorará la productividad de tu equipo: las páginas se cargarán más rápido y la ejecución de nuevas aplicaciones resultará más ágil y simple.\r\n\r\nPotenciá tu PC\r\nCon su tecnología DDR4, mejorará el desempeño de tu equipo, ya que aumentará la fluidez y la velocidad en la transferencia de datos ¡Optimizá al máximo el rendimiento de tu computadora y reducí el consumo energético!\r\n\r\nTu equipo como nuevo\r\nEsta memoria de formato DIMM es ideal para tu Computadoras de escritorio. ¡Instalala y comenzá a disfrutar de un óptimo funcionamiento!'),
(74, 2, 12, 8, 'Fuente de alimentación para PC LNZ SX Series SX500-FC 500W negra 115V/230V', '1649b7ab0c7aa4.png', '1649b7ab0c7beb.png', 13999.00, 'Con la fuente de alimentación LNZ SX500-FC podrás asegurar la corriente continua y estable de tu computadora de escritorio y optimizar el funcionamiento de sus componentes.\r\n\r\nControl de temperatura\r\nA través de su sistema de refrigeración, podrás mantener la temperatura ideal de sus componentes y evitar su sobrecalentamiento.\r\n\r\nSin ruido ni distracciones\r\nDebido a su funcionamiento silencioso, tu equipo operará minimizando el nivel de ruido, para que tu jornada sea más agradable.'),
(75, 2, 3, 2, 'Intel Core i7-10700KF BX8070110700KF de 8 núcleos y 5.1GHz de frecuencia', '1649b7b18a802c.png', '1649b7b18a8190.png', 263510.00, 'Productividad y entretenimiento, todo disponible en tu computadora de escritorio. La superioridad tecnológica de INTEL es un beneficio para todo tipo de profesionales. Asegura el mejor rendimiento de las aplicaciones, de la transferencia de datos y la conexión con otros elementos tecnológicos.\r\n\r\nNúcleos: el corazón del procesador\r\nEn este producto, encontrarás los núcleos, que son los encargados de ejecutar las instrucciones y actividades que le asignás a tu dispositivo. Estos tienen relación directa con dos elementos: los hilos y el modelo. Por lo tanto, a la hora de elegir un procesador, es importante que valores los tres en su conjunto.\r\n\r\nMáxima potencia\r\nAl estar desbloqueado, podrás realizar overclocking y así aumentar la frecuencia de funcionamiento y optimizar el rendimiento de tu equipo. Personalizalo a tu gusto y disfrutá de tus videojuegos o hacé que la renderización de imágenes sea más ágil. ¡Descubrí el abanico de posibilidades que esta función te ofrece!'),
(76, 1, 1, 1, 'GT 1030 GV-N1030D5-2GL 2GB', '1649b7b59df9ea.png', '1649b7b59dfb41.png', 75499.00, 'Este componente electrónico procesa la información que llega al dispositivo y los transforma en imágenes o videos para mostrarla visualmente. Es ideal para trabajar con aplicaciones gráficas ya que permite obtener imágenes más nítidas.\r\n\r\nNvidia es el fabricante líder de placas de video; su calidad asegura una experiencia positiva en el desarrollo del motor gráfico de tu computadora. Además, sus procesadores usan tecnología de punta para que puedas disfrutar de un producto veloz y duradero.\r\n\r\nEn el menor tiempo posible\r\nCon una velocidad de memoria de 6008 MHz los datos del procesador central se van a traducir en información comprensible en tan solo un abrir y cerrar de ojos; decodificará tantos ciclos por segundo que hará más efectiva la transmisión de datos a otros componentes. Con esta cualidad, el equipo ganará agilidad y eficiencia.\r\n\r\nVelocidad en cada lectura\r\nComo cuenta con 384 núcleos, los cálculos para el procesamiento de gráficos se realizarán de forma simultánea logrando un resultado óptimo del trabajo de la placa. Esto le permitirá ejecutar lecturas dispersas y rápidas de y hacia la GPU.\r\n\r\nCalidad de imagen\r\nCriterio fundamental a la hora de elegir una placa de video, su resolución de 4096x2160 no te defraudará. La decodificación de los píxeles en tu pantalla te harán ver hasta los detalles más ínfimos en cada ilustración.'),
(77, 2, 12, 8, 'Fuente De Alimentación Para Pc Redragon Gc Series Gc-ps011 800w Black 100v/240v 80 Plus Bronze Modular', '1649b7bb32bfde.png', '1649b7bb32c132.png', 45569.00, 'Diseñada para ganar espacio.\r\nSus cables desmontables y flexibles permiten optimizar espacio utilizando sólo los necesarios. Si eres de los que prefieren prolijidad por fuera y también por dentro, esta fuente te encantará.\r\n\r\nCalidad 80 Plus Bronze.\r\nPuedes estar seguro de que la eficiencia de la energía consumida siempre será superior al 80%. ¡Lo certificamos!\r\n\r\nMáxima productividad, en silencio.\r\nSu ventilador de 140 mm. está fabricado con rodamientos suaves que la mantienen al mínimo de ruido aún en la máxima carga, garantizando siempre un eficiente flujo de aire.\r\n\r\nMás estabilidad para más horas de ocio.\r\nConstruidas con condensadores sólidos de grado A, de fabricación japonesa. Cada componente posee una gran calidad y está listo para funcionar a altos niveles de exigencia con la mayor seguridad.\r\n\r\nFicha técnica:\r\n* Watts: 800\r\n* Dimensiones: 160x150x86 mm\r\n* Color: Negro\r\n* Tamaño del ventilador: 140 mm\r\n* Largo del cable de alimentación: 500 mm\r\n* Conectores internos: 24P(20+4) x 1, Molex x 3, SATA x 6, PCI-E 8P(6+2) x 4, CPU 8P(4+4) x 2\r\n* ATX versión: ATX 12V 2.30\r\n* Voltaje de entrada: 100-240 V\r\n* Corriente de entrada: 10A Max.\r\n* Frecuencia de entrada: 47/63 Hz\r\n* Factor de corrección (PFC): >0.85 Activo\r\n* Eficiencia: 80Plus Bronce\r\n* Temperatura de operación: 30-40 °C\r\n* Formato: Modular\r\n* Contenido de la caja: Manual de uso, Sticker Redragon, Tornillos y precintos, Cable de alimentación'),
(78, 2, 12, 7, 'Disco Solido Ssd 1tb M.2 Kingston Snv2s/1000g Nvme Pcie 4.0', '1649b7bf13872d.png', '1649b7bf138878.png', 28799.00, 'Líder en el mercado de tecnologías, Kingston ofrece una gran variedad de dispositivos de almacenamiento. Su calidad y especialización en discos de estado sólido (SSD), de memoria y de USB cifrados la convierten una de las opciones más elegidas en el mercado internacional.'),
(79, 2, 1, 1, 'GTX 1660 SUPER TUF-GTX1660S-O6G-GAMING OC Edition 6GB', '1649b7c32ec23d.png', '1649b7c32ec35d.png', 186808.00, 'Este componente electrónico procesa la información que llega al dispositivo y los transforma en imágenes o videos para mostrarla visualmente. Es ideal para trabajar con aplicaciones gráficas ya que permite obtener imágenes más nítidas.\r\n\r\nNvidia es el fabricante líder de placas de video; su calidad asegura una experiencia positiva en el desarrollo del motor gráfico de tu computadora. Además, sus procesadores usan tecnología de punta para que puedas disfrutar de un producto veloz y duradero.\r\n\r\nEn el menor tiempo posible\r\nCon una velocidad de memoria de 14002 MHz los datos del procesador central se van a traducir en información comprensible en tan solo un abrir y cerrar de ojos; decodificará tantos ciclos por segundo que hará más efectiva la transmisión de datos a otros componentes. Con esta cualidad, el equipo ganará agilidad y eficiencia.\r\n\r\nVelocidad en cada lectura\r\nComo cuenta con 1408 núcleos, los cálculos para el procesamiento de gráficos se realizarán de forma simultánea logrando un resultado óptimo del trabajo de la placa. Esto le permitirá ejecutar lecturas dispersas y rápidas de y hacia la GPU.\r\n\r\nCalidad de imagen\r\nCriterio fundamental a la hora de elegir una placa de video, su resolución de 7680x4320 no te defraudará. La decodificación de los píxeles en tu pantalla te harán ver hasta los detalles más ínfimos en cada ilustración.'),
(80, 1, 12, 9, 'Mouse Gamer Retroiluminado Netmak Shock Luces Rgb 1,5m', '1649c9eb119e95.png', '1649c9eb11a059.png', 1999.00, 'MOUSE GAMER RETROILUMINADO\r\nMarca: Netmak\r\nModelo: NM-SHOCK\r\n\r\nACERCA DEL PRODUCTO \r\n» Material antideslizante y antisudador\r\nJuega sin problemas durante mucho tiempo\r\n\r\n» Usb de alta velocidad\r\nTus datos llegan de manera mas veloz al servidor\r\n\r\n» Diseño ergonómico y ultra gamer\r\nDiseñado especialmente para que se adapte perfectamente a la palma de tu mano y obtener el mayor control de juego\r\n\r\n» Plug & Play\r\nNo requiere de ningún driver para instalar. Simplemente conecte y comience a jugar\r\n\r\n• CARACTERÍSTICAS •\r\n» Mouse Gamer Retroiluminado\r\n» Luces RGB.\r\n» Va cambiando de colores: Rojo / Verde / Turquesa / Azul / Verde Fluor / Violeta\r\n» Material antideslizante y antisudor.\r\n» Usb de alta velocidad.\r\n» Diseño ergonómico y ultra gamer.\r\n» Plug & Play.\r\n» Teclas: 3\r\n» Interfaz: USB\r\n» Longitud del cable: 1.5M\r\n» Material: ABS\r\n» Resolución: 1200 dpi\r\n'),
(81, 1, 12, 3, 'RAM Fury Beast DDR4 RGB color verde 8GB 1 Kingston KF432C16BBA/8', '1649c9e8e46b2b.png', '1649c9e8e46cde.png', 16499.00, 'Si tu computadora funciona con lentitud, si un programa no responde o no se carga, lo más probable es que se trate de un problema de memoria. Estos son posibles indicios de un rendimiento defectuoso en el día a día de tus tareas. Por ello, contar con una memoria Kingston -sinónimo de trayectoria y excelencia- mejorará la productividad de tu equipo: las páginas se cargarán más rápido y la ejecución de nuevas aplicaciones resultará más ágil y simple.\r\n\r\nPotenciá tu PC\r\nCon su tecnología DDR4, mejorará el desempeño de tu equipo, ya que aumentará la fluidez y la velocidad en la transferencia de datos ¡Optimizá al máximo el rendimiento de tu computadora y reducí el consumo energético!\r\n\r\nTu equipo como nuevo\r\nEsta memoria de formato DIMM es ideal para tu Computadoras de escritorio. ¡Instalala y comenzá a disfrutar de un óptimo funcionamiento!\r\n\r\nVelocidad para exigentes\r\nSi sos fanático de los juegos en línea o la usás para trabajar con programas o aplicaciones pesadas, esta memoria es para vos. Gracias a su velocidad de 2666 MHz, podrás disfrutar de un alto rendimiento y hacer tus trabajos de manera rápida y efectiva.'),
(82, 2, 1, 1, 'GT 1030 GT1030-2G-CSM 2GB', '1649b7cf536301.png', '1649b7cf5365b8.png', 62902.00, 'Este componente electrónico procesa la información que llega al dispositivo y los transforma en imágenes o videos para mostrarla visualmente. Es ideal para trabajar con aplicaciones gráficas ya que permite obtener imágenes más nítidas.\r\n\r\nNvidia es el fabricante líder de placas de video; su calidad asegura una experiencia positiva en el desarrollo del motor gráfico de tu computadora. Además, sus procesadores usan tecnología de punta para que puedas disfrutar de un producto veloz y duradero.\r\n\r\nEn el menor tiempo posible\r\nCon una velocidad de memoria de 6008 MHz los datos del procesador central se van a traducir en información comprensible en tan solo un abrir y cerrar de ojos; decodificará tantos ciclos por segundo que hará más efectiva la transmisión de datos a otros componentes. Con esta cualidad, el equipo ganará agilidad y eficiencia.\r\n\r\nVelocidad en cada lectura\r\nComo cuenta con 384 núcleos, los cálculos para el procesamiento de gráficos se realizarán de forma simultánea logrando un resultado óptimo del trabajo de la placa. Esto le permitirá ejecutar lecturas dispersas y rápidas de y hacia la GPU.\r\n\r\nCalidad de imagen\r\nCriterio fundamental a la hora de elegir una placa de video, su resolución de 4096x2160 no te defraudará. La decodificación de los píxeles en tu pantalla te harán ver hasta los detalles más ínfimos en cada ilustración.'),
(83, 2, 12, 4, 'Teclado Mecanico Gamer Xk1000 Led Switch Kailh Blue Keycap', '1649c9e2479972.png', '1649c9e2479b73.png', 24000.00, 'Este teclado Soul de alto rendimiento permite que puedas disfrutar de horas ilimitadas de juegos. Está diseñado especialmente para que puedas expresar tanto tus habilidades como tu estilo. Podrás mejorar tu experiencia de gaming, ya seas un aficionado o todo un experto y hacer que tus jugadas alcancen otro nivel.\r\n\r\nDistinción a todo color\r\nSu retroiluminación le da un toque diferente a tu equipo y resalta su composición cuando es utilizado en espacios poco iluminados.'),
(84, 2, 12, 9, 'Mouse gamer recargable K-Snake BM600 black', '1649c9d769ae28.png', '1649c9d769affc.png', 5490.00, 'Para trabajar desde casa con la computadora o aprovechar los momentos de ocio, necesitás comodidad y facilidad de movimiento. Con tu K-Snake BM600 encontrá eso que buscás en un solo aparato con la mejor tecnología.\r\n\r\nAdaptado a tus movimientos\r\nSu diseño eficaz hace de este mouse un elemento cómodo, con una gran experiencia de uso para aquellas personas que buscan seguridad en cada click.\r\n\r\nA un click de distancia\r\nSu sensor BlueEye permite que funcione con exactitud y control en cualquier tipo de superficie.\r\n\r\nLa funcionalidad al alcance de tu mano\r\nEl sistema de detección de movimiento óptico te permitirá mover el cursor de una manera más precisa y sensible que en los sistemas tradicionales.\r\n\r\nPlug And Play\r\nSolo debés colocar el receptor en un puerto USB de la computadora y ya podés empezar a usarlo. No hace falta emparejar el mouse ni descargar software para utilizarlo.\r\n\r\nTecnología inalámbrica\r\nTrabajá de forma inalámbrica y movete libremente sin ninguna interrupción. Al no haber cables, tu escritorio se mantiene despejado. Y además, podés llevar tu mouse fácilmente de un espacio de trabajo a otro.\r\n\r\nMayor duración de la batería\r\nCon batería recargable incorporada que podés cargar fácilmente con el cable USB incluido sin necesidad de reemplazarla. Para prolongar la duración, usá el conmutador de encendido para apagar el mouse cuando no lo estés usando.\r\n\r\nApto para fácil traslado\r\nNavegá rápidamente por documentos y páginas web gracias su diseño ultra delgado, ergonómico, liviano y conveniente para llevar a donde quieras o viajar.'),
(85, 1, 12, 4, 'Teclado gamer T-Dagger Bora T-TGK315 QWERTY T-Dagger Red español color negro con luz RGB', '1649c9dc7df8f8.png', '1649c9dc7dfb4d.png', 18999.00, 'Este teclado T-Dagger de alto rendimiento permite que puedas disfrutar de horas ilimitadas de juegos. Está diseñado especialmente para que puedas expresar tanto tus habilidades como tu estilo. Podrás mejorar tu experiencia de gaming, ya seas un aficionado o todo un experto y hacer que tus jugadas alcancen otro nivel.\r\n\r\nDistinción a todo color\r\nSu retroiluminación le da un toque diferente a tu equipo y resalta su composición cuando es utilizado en espacios poco iluminados.\r\n\r\nTecnología antighosting\r\nEste dispositivo tiene teclas antighosting. Esta cualidad es indispensable si requerís de un uso intensivo del periférico. Gracias a esto podrás evitar fallas al tocar varias teclas al mismo tiempo.'),
(86, 1, 1, 1, 'Rtx 2060 Super Colorful Battle Ax 8gb', '1649b7e76f0d3a.png', '1649b7e76f0e59.png', 231408.00, 'Chip Series GeForce® RTX 2060 SUPER\r\nProduct Series Colorful Series\r\nGPU Code Name TU106\r\nManufacturing Process 12nm\r\nCUDA Cores 2176\r\nCore Clock Base:1470Mhz; Boost:1650Mhz\r\nOne-Key OC /\r\nMemory Speed Grade 14Gbps\r\nMemory Size 8GB\r\nMemory Bus Width 256bit\r\nMemory Type GDDR6\r\nMemory Bandwidth 448 GB/S\r\nPower Connector 8pin\r\nPower Supply 6+2\r\nTDP 175W\r\nDisplay Ports DP+HDMI+DVI\r\nFans Type FAN\r\nHeat Pipe Number/Spec 2*8\r\nAuto Stop Technology N\r\nPower Suggest 550W\r\nDirectX 12.1/4.5\r\nNV technology Support Real-Time Ray Tracing, Ansel, GPU Boost\r\nSlot Number over 2 slot\r\nProduct Size 222*126*42mm\r\nProduct Weight 0.9KG(N.W)\r\nAccessories Warranty Card,Manual\r\nSpecifications Dual Fans compact size New Appearance Design'),
(87, 1, 12, 4, 'Teclado Gamer Gadnic Zt1000 Mecanico Rgb Outemu Blue', '1649c9d4ce8adc.png', '1649c9d4ce8c7b.png', 17999.00, 'Teclado mecánico para videojuegos, 88 teclas, compacto, portátil, con interruptores Outemu blue.\r\nDiseñado para una mayor durabilidad y capacidad de respuesta.\r\nLos interruptores son de la más alta calidad, probados para 50 millones de pulsaciones\r\nTeclado mecánico USB retroiluminado con LED arcoíris: 5 modos de juego diferentes, 5 modos de juego definidos por el usuario, 6 colores, soporta 14 impresionantes efectos de iluminación LED, el teclado iluminado tiene teclas moldeadas por inyección de doble disparo, proporciona retroiluminación transparente y de letras.\r\nPerfecto para uso doméstico o de oficina.\r\nDiseño ergonómico compacto y de alta calidad, duradero, de aleación de aluminio ABS con teclas mecánicas montadas en placa e interruptores, diseño de teclado mecánico de 88 teclas que ahorra espacio libera el espacio de trabajo en tu escritorio sin sacrificar el rendimiento y la comodidad en sesiones de juego\r\nNo importa cuántos botones se presionan, todos responden o disparan al mismo tiempo, todas las 88 teclas tienen interruptores individuales con \"Full n-key\" y \"anti-ghosting\" para un rendimiento impecable, la combinación de 12 funciones de acceso directo multimedia.\r\nFuerte compatibilidad: funciona perfectamente para Win2000/XP/Vista/Win7/Win8/Win10/ etc.'),
(88, 2, 12, 4, 'Teclado gamer Redragon Shiva K512 RGB QWERTY español latinoamérica color negro con luz RGB', '1649c9d2c2f00e.png', '1649c9d2c2f3b3.png', 16290.00, 'Disfrutá de tus partidas en otro nivel con Redragon, marca reconocida que se especializa en brindar la mejor experiencia de juego al público gamer desde hace más de 20 años. Sus teclados se adaptan a todo tipo de jugadores y esto los convierten en un fiel reflejo de la alta gama y calidad que la compañía ofrece.\r\n\r\nDistinción a todo color\r\nSu retroiluminación le da un toque diferente a tu equipo y resalta su composición cuando es utilizado en espacios poco iluminados.\r\n\r\nTecnología antighosting\r\nEste dispositivo tiene teclas antighosting. Esta cualidad es indispensable si requerís de un uso intensivo del periférico. Gracias a esto podrás evitar fallas al tocar varias teclas al mismo tiempo.'),
(89, 1, 12, 9, 'Mouse gamer Genius Scorpion M8-610 black y orange', '1649c9caa56c26.png', '1649c9caa56ddd.png', 4899.00, 'Desde hace más de 30 años, Genius está enfocado en la calidad, comodidad y facilidad de uso de sus productos. Su principal objetivo es proporcionarle a las personas una mejor experiencia de usuario. Además, busca incorporar diseños ecológicos que respeten el medio ambiente. El mouse Genius se caracteriza por suaves curvas que resultan cómodas para cualquier mano. Gracias a su resolución, conseguirás movimientos precisos en una amplia gama de superficies.\r\n\r\nAdaptado a tus movimientos\r\nEl mouse de juego te ofrecerá la posibilidad de marcar la diferencia y sacar ventajas en tus partidas. Su conectividad y sensor suave ayudará a que te desplaces rápido por la pantalla.\r\n\r\nA un click de distancia\r\nSu sensor BlueEye permite que funcione con exactitud y control en cualquier tipo de superficie.\r\n\r\nLa funcionalidad al alcance de tu mano\r\nSu sensor láser te permitirá ser preciso y exacto en tus movimientos.\r\n\r\nApto para fácil traslado\r\nNavegá rápidamente por documentos y páginas web gracias su diseño ultra delgado, ergonómico, liviano y conveniente para llevar a donde quieras o viajar.'),
(90, 2, 12, 2, 'Amd Ryzen 3 4100 100-100000510box 4 Núcleos', '1649c9c046b8b3.png', '1649c9c046ba97.png', 64999.00, 'Producto: Procesador Amd Ryzen 3 4100 4.0 Ghz AM4 Sin Gpu\r\n\r\n¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯\r\nEspecificaciones técnicas:\r\n- Marca : AMD\r\n- Línea : Ryzen 3\r\n- Modelo : 4100\r\n- P/N : 100-100000510BOX\r\n- UPC : 730143314060\r\n- GPU integrado : No\r\n- Caché : 4 MB\r\n- Cantidad de núcleos de CPU : 4\r\n- Hilos : 8\r\n- Tipos de memoria RAM soportadas : DDR4\r\n- Cantidad de RAM soportada : 128GB\r\n- Socket : AM4\r\n- Frecuencia mínima de reloj : 3.8 GHz\r\n- Frecuencia máxima de reloj : 4.0 GHz\r\n- Desbloqueado para OC : Si\r\n- Accesorios incluidos : Air cooler\r\n- TDP : 65W');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_x_vendedor`
--

CREATE TABLE `productos_x_vendedor` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_vendedor` int(10) UNSIGNED NOT NULL,
  `id_productos` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_x_vendedor`
--

INSERT INTO `productos_x_vendedor` (`id`, `id_vendedor`, `id_productos`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `roles` enum('usuario','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `nombre_usuario`, `nombre_completo`, `password`, `roles`) VALUES
(1, 'sedaloria0@gmail.com', 'admin', 'Sebastián Loria', '$2y$10$g5dCeXDEVIhi3bRNnNyHKudM6cWJTPGttLui7vTy5Z503YiT4aMGG', 'admin'),
(2, 'martinez.lucas@davinci.edu.ar', 'Lucas123', 'Lucas Martines', '$2y$10$oVArjW.BH9sfutnbXc9nuuPnhiR3RzODMluLo7K2dl3petlPMG4N2', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `foto_perfil` varchar(256) NOT NULL,
  `valoracion` enum('Muy malo','Malo','Bueno','Muy bueno','Excelente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`id`, `nombre`, `foto_perfil`, `valoracion`) VALUES
(1, 'Tomás Friz', '1649e73774d82d.jpg', 'Muy bueno'),
(2, 'Sebastián Loria', '1649e7a1f281c3.jpg', 'Bueno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vendedor` (`id_vendedor`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_vendedor_2` (`id_vendedor`);

--
-- Indices de la tabla `productos_x_vendedor`
--
ALTER TABLE `productos_x_vendedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vendedor` (`id_vendedor`),
  ADD KEY `id_productos` (`id_productos`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `productos_x_vendedor`
--
ALTER TABLE `productos_x_vendedor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_x_vendedor`
--
ALTER TABLE `productos_x_vendedor`
  ADD CONSTRAINT `productos_x_vendedor_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_x_vendedor_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
