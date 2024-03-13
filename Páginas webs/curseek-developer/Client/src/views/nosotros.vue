<template>
    <div class="flex min-h-screen bg-white">
        <!-- Menú lateral -->
        <div class="bg-gray-200 text-black w-1/4 px-6 py-6">
            <h2 class="text-2xl font-semibold mb-8">Documentación</h2>
            <ul>
                <a href="#/acerca">
                    <li
                        class="pb-1 rounded-lg bg-gray-100 hover:bg-indigo-100 border-b border-r border-gray-300 transition p-2">
                        Acerca de Nosotros
                    </li>
                </a>
                <a href="#/preguntasFrecuentes">
                    <li
                        class="pb-1 rounded-lg bg-gray-100 hover:bg-indigo-100 border-b border-r border-gray-300 transition p-2">
                        Preguntas Frecuentes
                    </li>
                </a>
                <a href="#/nuestroEquipo">
                    <li
                        class="pb-1 rounded-lg bg-gray-100 hover:bg-indigo-100 border-b border-r border-gray-300 transition p-2">
                        Nuestro Equipo
                    </li>
                </a>
                <a href="#/privacidad">
                    <li
                        class="pb-1 rounded-lg bg-gray-100 hover:bg-indigo-100 border-b border-r border-gray-300 transition p-2">
                        Políticas de Privacidad
                    </li>
                </a>
                <a href="#/terminos">
                    <li
                        class="pb-1 rounded-lg bg-gray-100 hover:bg-indigo-100 border-b border-r border-gray-300 transition p-2">
                        Términos y Condiciones
                    </li>
                </a>
                <a href="#/soporte">
                    <li
                        class="pb-1 rounded-lg bg-gray-100 hover:bg-indigo-100 border-b border-r border-gray-300 transition p-2">
                        Soporte
                    </li>
                </a>
            </ul>
        </div>
        <!-- Contenido principal -->
        <div class="flex-1 p-8">
            <!-- Contenido basado en la ruta actual -->
            <router-view></router-view>
            <!-- Preguntas Frecuentes -->
            <div v-if="$route.hash === '#/preguntasFrecuentes'">
                <h3 class="text-3xl font-semibold mb-4">Preguntas Frecuentes</h3>
                <div v-for="(pregunta, index) in preguntas" :key="index" class="mb-3">
                    <h4 @click="togglePregunta(index)"
                        class="cursor-pointer text-md hover:shadow-md shadow-sm font-semibold mb-0 transition p-2">
                        {{ pregunta.pregunta }}
                        <span class="float-right" :class="{ 'transform rotate-180': pregunta.abierta }">
                            ▼
                        </span>
                    </h4>
                    <ul>
                        <li v-show="pregunta.abierta" class="text-sm bg-gray-100 rounded-b-xl px-6 py-4">
                            {{ pregunta.respuesta }}
                        </li>
                    </ul>
                </div>
            </div>
            <div v-if="$route.hash === '#/nuestroEquipo'">
                <h3 class="text-3xl font-semibold mb-4">Nuestro Equipo</h3>
                <p class="md:pr-40">
                    CurSeek es impulsado por un equipo apasionado y dedicado de profesionales. Aquí te presentamos a algunos
                    de los miembros clave de nuestro equipo:
                </p>
                <div class="grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    <!-- Card 1 -->
                    <div class="bg-white p-6 rounded-lg shadow-md md:mx-40 mb-4">
                        <img src="https://lh3.googleusercontent.com/a-/ALV-UjUOdWbneS_2U1P8VDsQFxjmSkp8Xv0xitK1IIF5rOuBWA=s48-p"
                            alt="Imágen del Programador 1" class="w-24 object-cover mb-4 rounded-full">
                        <h4 class="text-xl font-semibold">Jairo Ramirez Dos Santos</h4>
                        <h5 class="text-sm text-gray-600 italic mb-2">Founder</h5>
                        <p class="text-black">
                            Jairo, fundador y CEO apasionado de CurSeek, canaliza su amor por la programación web hacia
                            una misión única. Originario de Venezuela y ahora radicado en Buenos Aires, ha forjado CurSeek
                            con la firme creencia de que todos merecen acceso fácil a la educación, incluso a cursos menos
                            conocidos.

                            Impulsado por la necesidad de democratizar el conocimiento, Jairo se embarcó en la creación de
                            CurSeek. Su visión se centra en hacer que cursos menos famosos y no tan solicitados estén al
                            alcance de todos. Con una mezcla de dedicación técnica y pasión por la educación, lidera CurSeek
                            para que sea una plataforma inclusiva, brindando oportunidades de aprendizaje a personas de todo
                            el mundo, sin importar la popularidad de los cursos. Su compromiso con hacer que el conocimiento
                            sea accesible destaca en el corazón de esta iniciativa única.
                        </p>
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-white p-6 rounded-lg shadow-md md:mx-40 mb-4">
                        <img src="https://lh3.googleusercontent.com/a/ACg8ocKl8CKX-qlmOjBcBxtZCsS5KPVD3yELG44p0-2iMxf9nIo=s48-p"
                            alt="Imágen del Programador 1" class="w-24 object-cover mb-4 rounded-full">
                        <h4 class="text-xl font-semibold">Matias Alejo Varas</h4>
                        <h5 class="text-sm text-gray-600 italic mb-2">Co-Founder</h5>
                        <p class="text-black">Matías, co-fundador y COO de CurSeek, desempeñando un
                            papel esencial desde los inicios del proyecto en 2023. Iniciaron esta emocionante travesía
                            juntos, construyendo CurSeek desde cero con pasión y determinación.
                            Su conexión con Jairo se forjó en la escuela DaVinci, específicamente en clases de programación
                            web. Desde la capital federal de Argentina, Matías aporta su energía y habilidades
                            excepcionales, encontrando inspiración tanto en la música como en la programación. Juntos, han
                            llevado a CurSeek a nuevos horizontes con su colaboración exitosa y dedicación compartida.
                        </p>
                    </div>
                </div>
            </div>
            <div v-if="$route.hash === '#/acerca'">
                <h3 class="text-3xl font-semibold mb-4">Acerca de Nosotros</h3>
                <div class="flex px-4 md:px-40 items-center justify-center">
                    <div class="w-1/1">
                        <img class="max-w-xs" src="../assets/team.jpg" alt="Imágen equipo team work">
                    </div>
                    <!-- <p class="text-black text-md">
                        CurSeek es una plataforma web y aplicación móvil que funciona como un buscador de cursos,
                        siguiendo un enfoque similar al de los populares motores de búsqueda de vuelos y hoteles.
                        Sin embargo, su principal propósito es recopilar y presentar los cursos de mayor calidad
                        y mejor valorados disponibles en línea.
                        La plataforma se dedica a reunir información de una amplia gama de cursos educativos de
                        diversas temáticas y niveles de dificultad, provenientes de fuentes diversas en Internet.
                    </p> -->
                </div>
                <div class="block px-20">
                    <h3 class="text-xl font-semibold mb-2">Nuestro objetivo es hacer que la educación en línea funcione para
                        todos.</h3>
                    <p class="text-black text-md mb-4">
                        CurSeek es un directorio de cursos en línea. Recopilamos cursos de muchos proveedores para facilitar
                        la
                        búsqueda de los mejores cursos sobre casi cualquier tema, dondequiera que existan. Sea cual sea tu
                        interés de aprendizaje, es muy probable que nuestro catálogo incluya un curso que satisfaga tus
                        necesidades.
                        A través de CurSeek, puedes encontrar cursos; revisar los cursos que has tomado (y leer las reseñas
                        de
                        otras personas); seguir universidades, temas y cursos para recibir actualizaciones personalizadas; y
                        también planificar y realizar un seguimiento de tu aprendizaje.
                    </p>
                    <h3 class="text-xl font-semibold mb-2">Impulsado por la comunidad</h3>
                    <p class="text-black text-md mb-4">
                        CurSeek es una empresa remota sin oficinas físicas. Nuestro equipo está formado por aprendices cuyas
                        vidas han sido impactadas por la educación en línea. Entre todos nosotros, hemos realizado más de
                        400
                        cursos en línea y 3 grados en línea. Si nuestros nombres te resultan familiares, puede ser porque
                        hayas
                        leído artículos que hemos escrito o incluso porque uno de nosotros ha sido mentor en un curso que
                        tomaste.
                        Nuestro objetivo es hacer que la educación en línea funcione para todos, así que estamos trabajando
                        constantemente en nuevas características. Si tienes una idea para hacer que CurSeek sea más útil,
                        por
                        favor háznoslo saber.
                    </p>
                    <h3 class="text-xl font-semibold mb-2">El Informe</h3>
                    <p class="text-black text-md mb-4">
                        Estamos en el negocio de educar a las personas sobre la educación. Además de nuestro catálogo, El
                        Informe de CurSeek mantiene un seguimiento del estado general del panorama de la educación en línea.
                        Nos
                        gusta especialmente descubrir historias pasadas por alto y determinar tendencias que otros aún no
                        han
                        informado.
                    </p>
                    <h3 class="text-xl font-semibold mb-2">¿Cómo ganamos dinero?</h3>
                    <p class="text-black text-md mb-4">
                        CurSeek genera ingresos a través de la publicidad y los enlaces de afiliados. Hemos tratado de
                        indicar
                        claramente los anuncios y los resultados de búsqueda patrocinados. Ganamos una comisión cuando
                        alguien
                        hace clic en un proveedor de cursos y se actualiza a una oferta de pago. Para una parte sustancial
                        de
                        nuestro catálogo, no tenemos asociaciones de afiliados. Nuestras relaciones de afiliación y
                        publicidad
                        no influyen en la lista de cursos, ni afectan las reseñas de los usuarios. Lo más importante para
                        nosotros es mantener una relación de confianza con nuestros usuarios, por lo que queremos ser
                        transparentes sobre cómo se pagan las facturas.
                    </p>
                </div>
            </div>
            <!-- Información sobre "Políticas de Privacidad" -->
            <div v-if="$route.hash === '#/privacidad'">
                <h3 class="text-3xl font-semibold mb-4">Políticas de Privacidad</h3>
                <p>
                    En Curseek, nos tomamos la privacidad en serio.
                    Consulta nuestra política de privacidad para obtener detalles sobre cómo
                    recopilamos, utilizamos y protegemos tu información personal.
                </p>
                <section>
                    <h3 class="text-xl font-semibold mb-4 mt-8">1. Introducción</h3>
                    <p>
                        En Curseek, nos comprometemos a proteger la privacidad de nuestros usuarios.
                        Nuestra política de privacidad explica cómo recopilamos, usamos y protegemos la
                        información personal que compartes con nosotros.
                    </p>
                </section>
                <section class="mt-8">
                    <h3 class="text-xl font-semibold mb-4">2. Información que Recopilamos</h3>
                    <p>
                        Recopilamos información sobre los cursos que buscas y visualizas en nuestra plataforma.
                        Esto puede incluir detalles como tus consultas de búsqueda, cursos vistos y preferencias.
                    </p>
                </section>
                <section class="mt-8">
                    <h3 class="text-xl font-semibold mb-4">3. Uso de la Información</h3>
                    <p>
                        Utilizamos la información recopilada para mejorar y personalizar tu experiencia en Curseek.
                        Esto puede incluir recomendaciones de cursos basadas en tus intereses y patrones de búsqueda.
                    </p>
                </section>
                <!-- Puedes seguir agregando más secciones según sea necesario -->
            </div>
            <!-- Información sobre "Términos y Condiciones" -->
            <div v-if="$route.hash === '#/terminos'">
                <h3 class="text-3xl font-semibold mb-4">Términos y Condiciones</h3>
                <p>
                    Al utilizar nuestros servicios, aceptas nuestros términos y condiciones.
                    Asegúrate de leerlos detenidamente para comprender las reglas y pautas que
                    rigen el uso de Curseek.
                </p>
                <section>
                    <h3 class="text-xl font-semibold mb-4 mt-8">1. Uso del Sitio</h3>
                    <p>
                        Estás autorizado a utilizar Curseek con el propósito de buscar y acceder a información
                        sobre cursos en línea. No debes utilizar el sitio de una manera que pueda dañar,
                        desactivar o sobrecargar nuestros servidores, o interferir con el uso y disfrute de
                        Curseek por parte de otras personas.
                    </p>
                </section>
                <section class="mt-8">
                    <h3 class="text-xl font-semibold mb-4">2. Contenido del Usuario</h3>
                    <p>
                        Como parte de nuestros servicios, puedes enviar contenido, como reseñas y calificaciones.
                        Asegúrate de que tu contenido cumpla con nuestras pautas de comunidad y no viole los
                        derechos de terceros.
                    </p>
                </section>
                <section class="mt-8">
                    <h3 class="text-xl font-semibold mb-4">3. Privacidad</h3>
                    <p>
                        Respetamos tu privacidad. Consulta nuestra política de privacidad para comprender cómo
                        recopilamos, utilizamos y protegemos tu información personal.
                    </p>
                </section>
                <!-- Puedes seguir agregando más secciones según sea necesario -->
            </div>
            <!-- Información sobre "soporte" -->
            <div v-if="$route.hash === '#/soporte'">
                <h3 class="text-3xl font-semibold mb-4">Soporte</h3>
                <p class="pb-4">
                    ¿Tienes preguntas o comentarios? ¡Estamos aquí para ayudarte!
                    Ponte en soporte con nuestro equipo de soporte a través de curseek@gmail.com
                    o llámanos al +54 11 456 789.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Tarjeta para el correo electrónico -->
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold mb-2">Correo Electrónico</h4>
                        <p>
                            ¿Tienes preguntas o comentarios? Estamos aquí para ayudarte.
                            Ponte en contacto con nuestro equipo de soporte a través de:
                        </p>
                        <a href="mailto:curseek@gmail.com" class="text-blue-500 hover:underline">curseek@gmail.com</a>
                    </div>
                    <!-- Tarjeta para el número de teléfono -->
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold mb-2">Número de Teléfono</h4>
                        <p>
                            ¿Prefieres hablar directamente con nosotros? Llámanos o envía un SMS al siguiente número:
                        </p>
                        <a href="tel:+123456789" class="text-blue-500 hover:underline">+54 11 456 789</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Documentacion',
    data() {
        return {
            preguntas: [
                {
                    pregunta: "¿Qué hace diferente a CurSeek de otros buscadores de cursos?",
                    respuesta:
                        "CurSeek se destaca por su enfoque en recopilar y presentar cursos de alta calidad y bien valorados, brindando a los usuarios una selección confiable y diversa.",
                    abierta: false,
                },
                {
                    pregunta: "¿Cómo puedo buscar cursos específicos en CurSeek?",
                    respuesta:
                        "Utiliza el campo de búsqueda en la página principal para ingresar palabras clave y encontrar cursos que se adapten a tus necesidades y preferencias educativas.",
                    abierta: false,
                },
                {
                    pregunta: "¿CurSeek ofrece cursos de todas las temáticas?",
                    respuesta:
                        "Sí, CurSeek recopila cursos de diversas temáticas y niveles educativos, asegurando una amplia gama de opciones para los usuarios.",
                    abierta: false,
                },
                {
                    pregunta: "¿Cómo puedo seguir un curso en CurSeek?",
                    respuesta:
                        "Para seguir un curso, simplemente haz clic en el botón 'Seguir' en la página del curso deseado. Esto te permitirá recibir actualizaciones y notificaciones sobre ese curso.",
                    abierta: false,
                },
                {
                    pregunta: "¿Puedo marcar cursos como favoritos en CurSeek?",
                    respuesta:
                        "Sí, puedes marcar cursos como favoritos para crear una lista personalizada. Utiliza la función de 'Favoritos' para organizar y acceder fácilmente a los cursos que te interesan.",
                    abierta: false,
                },
                {
                    pregunta: "¿Cómo funciona el sistema de valoración de cursos en CurSeek?",
                    respuesta:
                        "Los cursos en CurSeek son valorados por la comunidad de usuarios. Puedes ver las valoraciones y reseñas para tomar decisiones informadas sobre los cursos que te interesan.",
                    abierta: false,
                },
                {
                    pregunta: "¿Hay cursos gratuitos en CurSeek?",
                    respuesta:
                        "Sí, CurSeek incluye una variedad de cursos gratuitos. Puedes filtrar los resultados de búsqueda para mostrar solo cursos gratuitos si lo deseas.",
                    abierta: false,
                },
                {
                    pregunta: "¿Cómo puedo acceder a los cursos en CurSeek?",
                    respuesta:
                        "CurSeek no almacena los cursos directamente. Al hacer clic en un curso, serás redirigido al sitio web o plataforma que ofrece ese curso específico para acceder a los materiales y contenido.",
                    abierta: false,
                },
                {
                    pregunta: "¿CurSeek ofrece recursos para aprender en diferentes idiomas?",
                    respuesta:
                        "Sí, CurSeek busca cursos en varios idiomas para satisfacer las necesidades de usuarios de todo el mundo. Puedes ajustar tus preferencias de idioma en la configuración.",
                    abierta: false,
                },
                {
                    pregunta: "¿Cómo puedo contactar al soporte de CurSeek si tengo problemas?",
                    respuesta:
                        "Si encuentras problemas o tienes preguntas, puedes ponerte en contacto con nuestro equipo de soporte a través del formulario de contacto en la sección 'Soporte'. Estamos aquí para ayudarte.",
                    abierta: false,
                },
            ],
        };
    },
    methods: {
        togglePregunta(index) {
            this.preguntas[index].abierta = !this.preguntas[index].abierta;
        },
    },
}
</script>