-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2024 a las 23:17:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `tipo_carrera` enum('Licenciatura','Tecnicatura','Profesorado','Ingeniería','Diplomatura','Otros') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id_carrera`, `nombre`, `descripcion`, `titulo`, `tipo_carrera`) VALUES
(1, 'Licenciatura en Gestión Ambiental', 'La Licenciatura en Gestión Ambiental se propone la formación de profesionales con una visión sistémica, ética y científica, asumiendo el compromiso de lograr un estrecho lazo con el medio local y regional; atendiendo a sus problemáticas y demandas, y favoreciendo la retroalimentación necesaria para un desarrollo sustentable, desde los saberes y capacidades propias de su campo profesional.', 'Licenciado en Gestión Ambiental', 'Licenciatura'),
(2, 'Tecnicatura Universitaria en Ciberseguridad', 'Participar en estudios sobre la situación actualizada en materia de ciberseguridad.\nAsesorar en la gestión de programas de ciberseguridad y ciberdelito.\nParticipar en equipos multidisciplinarios para la elaboración de soluciones ante incidentes de ciberseguridad y ciberdelitos.\nPromover el desarrollo de iniciativas públicas y privadas sobre la creación y asesoramiento en emprendimientos y empresas relacionados a la temática.\n', 'Técnico Universitario en Ciberseguridad', 'Tecnicatura'),
(3, 'Tecnicatura Universitaria en Gestión Ambiental', 'La Tecnicatura Universitaria en Gestión Ambiental se propone la formación de profesionales con una visión sistémica, ética y científica que aporten técnicamente al desarrollo sustentable local, nacional y regional desde saberes y capacidades propias de su campo profesional.', 'Técnico Universitario en Gestión Ambiental', 'Tecnicatura'),
(4, 'Tecnicatura en Desarrollo de Videojuegos', 'Formar técnicos capaces de desempeñarse con solvencia en el desarrollo integral de videojuegos atendiendo al diseño, la programación, el arte, la realización y la comercialización, áreas disciplinares clave para la concreción de los proyectos.', 'Técnico en Desarrollo de Videojuegos', 'Tecnicatura'),
(5, 'Tecnicatura en Edición Audiovisual', 'Las tecnicaturas en Edición Audiovisual y en Sonido Audiovisual son dos carreras distintas y complementarias que aportan conocimientos y herramientas para desarrollarse profesionalmente en el campo de la producción y posproducción audiovisual en el marco del auge de las Tecnologías de Información y Comunicación (TIC). En este sentido, se concibe al audiovisual como un objeto comunicacional complejo y dinámico que requiere un abordaje multidisciplinario y una alta dosis de creatividad.', 'Técnico en Edición Audiovisual', 'Tecnicatura'),
(6, 'Tecnicatura en Sonido Audiovisual', 'Las tecnicaturas en Edición Audiovisual y en Sonido Audiovisual son dos carreras distintas y complementarias que aportan conocimientos y herramientas para desarrollarse profesionalmente en el campo de la producción y posproducción audiovisual en el marco del auge de las Tecnologías de Información y Comunicación (TIC). En este sentido, se concibe al audiovisual como un objeto comunicacional complejo y dinámico que requiere un abordaje multidisciplinario y una alta dosis de creatividad.', 'Técnico en Sonido Audiovisual', 'Tecnicatura'),
(7, 'Licenciatura en Ciencias Forenses y Criminología', 'La Licenciatura en Ciencias Forenses y Criminología se propone la formación de profesionales con una visión sistémica, ética y científica que aporten técnicamente a la investigación de delitos y al estudio de políticas públicas de seguridad desde saberes y capacidades propias de su campo profesional.', 'Licenciado en Ciencias Forenses y Criminología', 'Licenciatura'),
(8, 'Licenciatura en Economía', 'Los economistas estudian cómo se producen, distribuyen y consumen los bienes y servicios. Esta carrera enseña a analizar mercados, evaluar políticas públicas y predecir tendencias económicas a nivel global y nacional.', 'Licenciado en Economía', 'Licenciatura'),
(9, 'Tecnicatura Universitaria en Análisis Contable', 'Formar profesionales con los conocimientos y capacidades que aporten técnicamente a la gestión contable de empresas, organizaciones sin fin de lucro y emprendimientos.', 'Técnico Universitario en Análisis Contable', 'Tecnicatura'),
(10, 'Tecnicatura Universitaria en Criminalística', 'La Tecnicatura Universitaria en Criminalística se propone la formación de profesionales con una visión sistémica, ética y científica que aporten técnicamente a la investigación de delitos desde saberes y capacidades propias de su campo profesional.', 'Técnico Universitario en Criminalística', 'Tecnicatura'),
(11, 'Licenciatura en Gestión Educativa CCC', '(Carrera de Ciclo de Complementación Curricular)Brindar una formación universitaria a los/as actuales y futuros responsables de dirigir, asesorar, gestionar y supervisar una educación de calidad en las instituciones educativas, en el actual contexto de transformaciones de la educación en nuestro país establecido por la Ley de Educación Nacional Nº 26206.', 'Licenciado en Gestión Educativa', 'Licenciatura'),
(12, 'Licenciatura en Gestión Pública CCC', '(Carrera de Ciclo de Complementación Curricular)La Licenciatura en Gestión Pública se propone la formación de profesionales capaces de analizar la realidad e intervenirla a partir de los conocimientos sobre las dinámicas de funcionamiento del Estado, del gobierno y de la gestión pública, sus estructuras, los actores que intervienen y lo relativo a los sistemas políticos contemporáneos. A su vez, se pretende profundizar los conocimientos sobre el diseño, análisis y evaluación de las políticas públicas, en general, con especial atención en las políticas sociales, prestando atención a los actores que intervienen en dichos procesos y los conflictos de intereses y de cooperación que implican.', 'Licenciado en Gestión Pública', 'Licenciatura'),
(13, 'Licenciatura en Psicopedagogía', 'El Licenciado/a en Psicopedagogía estará capacitado para prevenir, diagnosticar y realizar intervenciones de asesoramiento, orientación y tratamiento en toda situación donde el aprendizaje y sus vicisitudes se pongan en juego, tanto en ámbitos de salud, educativos, laborales y socio comunitarios, facilitando en los sujetos de diversas edades la construcción de sus proyectos de vida en la comunidad.', 'Licenciado en Psicopedagogía', 'Licenciatura'),
(14, 'Licenciatura en Psicopedagogía CCC', '(Carrera de Ciclo de Complementación Curricular)Licenciado/a en Psicopedagogía estará capacitado para prevenir, diagnosticar y realizar intervenciones de asesoramiento, orientación y tratamiento en toda situación donde el aprendizaje y sus vicisitudes se pongan en juego, tanto en ámbitos de salud, educativos, laborales y socio comunitarios, facilitando en los sujetos de diversas edades la construcción de sus proyectos de vida en la comunidad.', 'Licenciado en Psicopedagogía', 'Licenciatura'),
(15, 'Profesorado en Educación Inicial', 'Formar Profesores/as en el Nivel Inicial que permita el ejercicio de la docencia y la formulación, el diseño y la ejecución de propuestas pedagógicas, didácticas y proyectos socioeducativos destinados a la Primera Infancia, en distintas instituciones de su campo de aplicación.', 'Profesor en Educación Inicial', 'Profesorado'),
(16, 'Tecnicatura Universitaria en Gestión Pública', 'La Tecnicatura Universitaria en Gestión Pública se propone la formación de profesionales con conocimientos en temas referidos al funcionamiento del Estado en sus diversos niveles (nacional, provincial, municipal) y que muestre capacidad para comprender la importancia del desarrollo de un Estado acorde a las necesidades sociales. Se pretende, a su vez, brindar conocimientos en aspectos que refieren al diseño, análisis y gestión de políticas públicas; las instituciones de gobierno y los procesos gubernamentales ligados a ellas; la comunicación y la economía de gobierno; la gestión de recursos humanos en el ámbito estatal y las particularidades que asume el sector público en Argentina.', 'Técnico Universitario en Gestión Pública', 'Tecnicatura'),
(17, 'Enfermería Universitaria', 'Formar profesionales en el campo de la Enfermería Universitaria, con conocimientos científicos, humanísticos, éticos, legales y políticos para proporcionar atención de enfermería a las personas, familias y grupos de la comunidad, con compromiso social y político; reconociendo y defendiendo la Salud, como un derecho humano y social y a la atención primaria, como estrategia de abordaje a la comunidad, con una actitud ética y de responsabilidad legal en el ejercicio profesional.', 'Enfermero Universitario', 'Tecnicatura'),
(18, 'Licenciatura en Instrumentación Quirúrgica CCC', '(Carrera de Ciclo de Complementación Curricular)La Licenciatura en Instrumentación Quirúrgica, se propone brindar una formación científica, técnica, humanística y de investigación, en relación a la organización, asistencia, investigación y docencia en el campo de incumbencias, en instituciones públicas o privadas.', 'Licenciado en Instrumentación Quirúrgica', 'Licenciatura'),
(19, 'Tecnicatura Universitaria en Emergencias Médicas', 'La Tecnicatura Universitaria en Emergencias Médicas tiene como objetivo formar profesionales capaces de organizar sistemas de respuesta ante emergencias, en el marco de la legislación sanitaria vigente y bajo la supervisión del médico hasta el traslado del paciente al centro de mayor complejidad.', 'Técnico Universitario en Emergencias Médicas', 'Tecnicatura'),
(20, 'Tecnicatura Superior en Alimentos', 'El Técnico en Alimentos garantiza calidad y ética en industrias y producción primaria con las habilidades adquiridas.', 'Técnico Superior en Alimentos', 'Tecnicatura'),
(21, 'Tecnicatura Superior en Higiene y Seguridad', 'Formación técnica en la gestión de la higiene industrial y seguridad laboral para la prevención de riesgos en el trabajo.', 'Técnico Superior en Higiene y Seguridad', 'Tecnicatura'),
(22, 'Tecnicatura Superior en Desarrollo de Software', 'El Técnico en Software crea y mantiene software, trabajando en proyectos multidisciplinarios.', 'Técnico Superior en Desarrollo de Software', 'Tecnicatura'),
(23, 'Profesorado de Educación Secundaria Técnico Profesional', 'El presente plan de estudios tiene por finalidad la formación pedagógico-didáctica para la\npráctica profesional así como la actualización científico tecnológica destinadas a formar\ndocentes con título de base que puedan desarrollar su práctica en las instituciones de la\nmodalidad de Educación Técnico Profesional con nivel secundario técnico. Esto supone\nadmitir que las destinatarias y los destinatarios cuentan con saberes técnicos y científicos\ntecnológicos relativos a un campo ocupacional específico. Tales saberes deben poder ser\nreconocidos, actualizados y, particularmente, articulados y complementados por aquellos\nsaberes relativos a su profesionalidad docente.', 'Profesor de Educación Secundaria Técnico Profesional', 'Profesorado'),
(24, 'Profesorado en instrumento', 'En está carrera se podrá aprender la pedagogía para poder enseñar a otros el arte de la música.', 'Profesor en Música (orientación Instrumento)', 'Profesorado'),
(25, 'Profesor en Canto', 'En está carrera se podrá aprender la pedagogía para poder enseñar a otros el arte de la música.', 'Profesor en Música (orientación Canto)\n', 'Profesorado'),
(26, 'Profesorado en Dirección Coral', 'En está carrera se podrá aprender la pedagogía para poder enseñar a otros el arte de la música.', 'Profesor en Música (orientación Dirección Coral)', 'Profesorado'),
(27, 'Profesorado en Composición', 'En está carrera se podrá aprender la pedagogía para poder enseñar a otros el arte de la música.', 'Profesor en Música (orientación Composición)\n', 'Profesorado'),
(28, 'Profesorado en Educación Musical', 'En está carrera se podrá aprender la pedagogía para poder enseñar a otros el arte de la música.', 'Profesor en Música (orientación Educación Musical)\n', 'Profesorado'),
(29, '\r\nProfesorado en Musicología', 'En está carrera se podrá aprender la pedagogía para poder enseñar a otros el arte de la música.', 'Profesor en Música (orientación Musicología)\n', 'Profesorado'),
(30, 'Ingeniería Civil', 'Estudio de la construcción y diseño de infraestructuras', 'Ingeniero Civil', 'Ingeniería'),
(31, 'Ingeniería en Energía Eléctrica', 'Formación en generación y distribución de energía eléctrica', 'Ingeniero en Energía Eléctrica', 'Ingeniería'),
(32, 'Ingeniería Automotriz', 'Diseño y desarrollo de vehículos automotores', 'Ingeniero Automotriz', 'Ingeniería'),
(33, 'Ingeniería Mecánica', 'Aplicación de principios de ingeniería para el diseño de sistemas mecánicos', 'Ingeniero Mecánico', 'Ingeniería'),
(34, 'Licenciatura en Organización Industrial', 'Gestión de procesos industriales y optimización de recursos', 'Licenciado en Organización Industrial', 'Licenciatura'),
(35, 'Tecnicatura Superior en Administración', 'Formación en administración y gestión empresarial', 'Técnico Superior en Administración', 'Tecnicatura'),
(36, 'Tecnicatura en Gestión de la Industria Automotriz', 'Especialización en la gestión de procesos de producción automotriz', 'Técnico en Gestión Automotriz', 'Tecnicatura'),
(37, 'Tecnicatura en Moldes, Matrices y dispositivos', 'Diseño y fabricación de moldes y dispositivos industriales', 'Técnico en Moldes y Matrices', 'Tecnicatura'),
(38, 'Tecnicatura en Programación', 'La rápida evolución del mundo informático obliga al individuo a capacitarse y dominar temas y herramientas de trabajo relacionadas estrechamente con esta temática. Esto implica poseer conocimientos básicos, como así también sobre temas específicos relacionados con las áreas de Programación, Análisis de datos, Diseño de Sistemas y particularmente el adecuado manejo de software que se aplican a las tareas administrativo-contables.   El mercado laboral presenta la necesidad de cubrir la falta de personal técnico capacitado en programación, que puede ser absorbido por organismos públicos o privados. En tal sentido se ofrece una rápida salida laboral con esta carrera de corta duración que proporciona recursos humanos capacitados. ', 'Técnico Universitario en Programación', 'Tecnicatura'),
(39, 'Tecnicatura en Mecatrónica', 'Página en proceso', 'Técnico en mecatrónica', 'Tecnicatura'),
(40, 'Tecnicatura en Ciencia de Datos e Inteligencia Artificial', 'Página en proceso', 'Técnico en ciencia de datos e inteligencia artificial', 'Tecnicatura'),
(41, 'Profesorado de Inglés', 'Forma profesionales en el uso de la comunicación para promover el desarrollo social, cultural y económico en comunidades y organizaciones. Los estudiantes adquieren habilidades en periodismo, diseño gráfico, producción audiovisual y gestión de proyectos sociales.', 'Profesor de inglés', 'Profesorado'),
(42, 'Tecnicatura en Trabajo Social', 'Página en proceso', 'Trabajador social', 'Tecnicatura'),
(43, 'Tecnicatura en Comunicación Social para el Desarrollo', 'Prepara a los estudiantes para comprender los procesos de comunicación e influencia social, así como para aplicar estrategias comunicativas efectivas. Cubre áreas como periodismo, relaciones públicas, publicidad y producción multimedia.', 'Técnico en comunicación social para el desarrollo', 'Tecnicatura'),
(44, 'Profesorado en Educación Especial(Modalidad Sordos e Hipoacúsicos)', 'Página en proceso', 'Profesor en Educación Especial con Orientación en Sordos e Hipoacúsicos', 'Profesorado'),
(45, 'Profesorado en Educación Especial(Modalidad Neuromotora)', 'Página en proceso', 'Profesor en Educación Especial con Orientación en Discapacidad Neuromotora', 'Profesorado'),
(46, 'Profesorado en Educación Especial(Modalidad Intelectual)', 'Página en proceso', 'Profesor en Educación Especial con Orientación en Discapacidad Intelectual', 'Profesorado'),
(47, 'Profesorado en Educación Especial(Modalidad Ciegos y Disminuidos Visuales)', 'Página en proceso', 'Profesor en Educación Especial Modalidad con Orientación en Ciegos y Disminuidos Visuales', 'Profesorado'),
(48, 'Profesorado de Educación Primaria', 'Formación de docentes para nivel primario', 'Profesor de Educación Primaria', 'Profesorado'),
(49, 'Profesorado para la Educación Secundaria en Biología', 'Formación de docentes en Biología para secundaria', 'Profesor en Biología', 'Profesorado'),
(50, 'Trayecto de Formación Pedagógica Complementaria para graduados técnicos de nivel superior-secundario', 'Formación pedagógica para técnicos y profesionales', 'Certificación Pedagógica', 'Otros'),
(51, 'Profesorado para la Educación Secundaria en Física', 'Formación de docentes en Física para secundaria', 'Profesor en Física', 'Profesorado'),
(52, 'Profesor/a de Educación Secundaria en Matemática', 'Formación de docentes en Matemática para secundaria', 'Profesor en Matemática', 'Profesorado'),
(53, 'Profesorado de Educación Secundaria en Geografía', 'Formación de docentes en Geografía para secundaria', 'Profesor en Geografía', 'Profesorado'),
(54, 'Profesorado de Educación Secundaria en Química', 'Formación de docentes en Química para secundaria', 'Profesor en Química', 'Profesorado'),
(55, 'Profesorado en Educación Física', 'Formación de docentes en Educación Física', 'Profesor en Educación Física', 'Profesorado'),
(56, 'Profesorado en Biología', 'Formación de docentes en Biología', 'Profesor en Biología', 'Profesorado'),
(57, 'Profesorado en Historia', 'Formación de docentes en Historia', 'Profesor en Historia', 'Profesorado'),
(58, 'Profesorado en Matemática', 'Formación de docentes en Matemática', 'Profesor en Matemática', 'Profesorado'),
(59, 'Profesorado en Lengua y Literatura', 'Formación de docentes en Lengua y Literatura', 'Profesor en Lengua y Literatura', 'Profesorado'),
(61, 'Licenciatura en Enfermería', 'Aplica cuidados de promoción, prevención, recuperación y rehabilitación en los tres niveles de atención en individuos sanos y enfermos, promoviendo el autocuidado e independencia precoz; en una relación interpersonal de participación mutua que asegure el respeto por la individualidad y dignidad personal de aquellos bajo su cuidado. Administra servicios de enfermería hospitalarios de menor complejidad y de comunidad; colabora en investigaciones en enfermería y otras relacionadas con el área de salud y participa en la educación para la salud.', 'Licenciado en Enfermería', 'Licenciatura'),
(62, 'Licenciatura en Logística', 'La Licenciatura en Logística abarca todo lo relacionado con la gestión de la cadena de suministros (supply chain), en cuanto al abastecimiento, producción y distribución. Se desarrolla sobre el concepto de logística integral relacionando transporte, movimiento y almacenamiento de bienes, desarrollo y sistematización de procesos y procedimientos, flujo y administración de información y controles.', 'Licenciado en Logística', 'Licenciatura'),
(63, 'Licenciatura en Seguridad', 'El licenciado en seguridad es un graduado universitario con sólida formación teórica, práctica y técnica en Seguridad como objeto de estudio, lo que le posibilita investigar, organizar, planificar, diseñar y conducir intervenciones adecuadas en proyectos, estrategias y acciones de seguridad en el marco de un Estado de Derecho.', 'Licenciado en Seguridad', 'Licenciatura'),
(64, 'Licenciatura en Seguridad e Higiene', 'Formar profesionales con capacidad para diagnosticar e intervenir en la resolución de problemas vinculados con la problemática de higiene y seguridad, según las áreas de competencias de sus carreras y en interacción con otras especialidades.', 'Licenciado en Seguridad e Higiene', 'Licenciatura'),
(65, 'Licenciatura en Gestión Gubernamental', 'El título de Licenciado/a tendrá validez nacional, pudiendo ejercer profesionalmente en cualquier área de la administración pública nacional, provincial o municipal dedicada al análisis, diseño, implementación y desarrollo de políticas públicas como así también para la comprensión, ejecución, coordinación y dirección de las actividades propias de la administración pública (nacional, provincial y municipal).', 'Licenciado en Gestión Gubernamental', 'Licenciatura'),
(66, 'Tecnicatura en Jardinería', 'Formar profesionales con conocimientos científicos, técnicos y estéticos que le permitan utilizar la tecnología existente y su creatividad artística para el diseño de una obra de jardinería, brindar las herramientas teóricas y generar aptitudes para la transformación y transferencia de los avances tecnológicos al medio laboral, y fomentar un pensamiento reflexivo sobre la realidad del sector a niveles nacional e internacional.', 'Técnico en Jardinería', 'Tecnicatura'),
(67, 'Tecnicatura en Floricultura', 'La carrera de Floricultura tiene por objetivo formar profesionales capacitados para la producción y el cultivo de plantas ornamentales, brindar los conocimientos científico técnicos a través de un enfoque interdisciplinario y la aplicación de tecnologías apropiadas que le permitan desempeñar su labor con valores estéticos y cualitativos de la producción artesanal tradicional, analizar y comprender el funcionamiento del sector productivo ornamental nacional y extranjero.', 'Técnico en Floricultura', 'Tecnicatura'),
(68, 'Tecnicatura en Producción Vegetal Orgánica', 'La carrera de Producción Vegetal Orgánica tiene como objetivo formar profesionales con sólidos conocimientos científicos y tecnológicos, capaces de intervenir en las cadenas productivas de manejo orgánico, en la actividad de investigación y extensión, y en la preservación de los recursos naturales desde una visión integral y sustentable, dentro de un contexto socioeconómico con diversos niveles de innovación e incertidumbre.', 'Técnico en Producción Vegetal Orgánica', 'Tecnicatura'),
(69, 'Tecnicatura Universitaria en Mantenimiento Industrial', 'Esta Tecnicatura Superior surge de la necesidad que tiene la industria en general de reforzar la formación de sus técnicos en algunos temas y en disminuir la brecha de formación entre el ingeniero y el técnico de nivel medio en el momento del ejercicio profesional. La Tecnicatura Superior en Mantenimiento Industrial abarca, entre otros, los conceptos de mantenimiento eléctrico, hidráulico, neumático, electrónico y de instalaciones frigoríficas desde una óptica integrada y actual.', 'Técnico Universitario en Mantenimiento Industrial', 'Tecnicatura'),
(70, 'Tecnicatura Universitaria en Procesos Industriales', 'Esta Tecnicatura Universitaria surge de la necesidad que tiene la industria en general de reforzar la formación de sus técnicos en algunos temas y en disminuir la brecha de formación entre el ingeniero y el técnico de nivel medio en el momento del ejercicio profesional.', 'Técnico Universitario en Procesos Industriales.', 'Tecnicatura'),
(71, 'Tecnicatura en Gestión Ambiental y Salud', 'Página en proceso', 'Técnico Universitario en Gestión Ambiental y Salud', 'Tecnicatura'),
(73, 'Actuario (Administración)', 'Esta carrera forma profesionales capaces de analizar y gestionar riesgos financieros, seguros y pensiones, aplicando matemáticas, estadística y modelos financieros para tomar decisiones estratégicas en empresas y organizaciones.', 'Actuario en Administración.', 'Licenciatura'),
(74, 'Contador Público', 'El contador público se especializa en la contabilidad, auditoría y control financiero de empresas. Su labor incluye llevar registros contables, preparar estados financieros y asesorar en temas fiscales y de control de gestión.', 'Contador Público.', 'Otros'),
(75, 'Licenciado en Administración', 'Esta carrera se enfoca en la gestión de recursos empresariales, abarcando áreas como marketing, finanzas, recursos humanos y operaciones. Los licenciados en administración tienen la capacidad de liderar proyectos y tomar decisiones estratégicas para mejorar el desempeño organizacional.', 'Licenciado en Administración.', 'Licenciatura'),
(77, 'Lic. en Sistemas de Información de las Organizaciones', 'Esta licenciatura combina conocimientos en tecnología y gestión empresarial, formando profesionales capaces de diseñar, implementar y gestionar sistemas de información que mejoren la eficiencia y la toma de decisiones en las organizaciones.', 'Licenciado en Sistemas de Información de las Organizaciones.', 'Licenciatura'),
(78, 'Actuario (Economía)', 'El actuario en economía se especializa en el análisis de riesgos económicos y financieros mediante la aplicación de modelos matemáticos y estadísticos. Se enfoca en la evaluación de mercados, previsión de tendencias económicas y gestión de riesgos en sectores como seguros, inversiones y finanzas. Su trabajo es clave para la toma de decisiones estratégicas en escenarios de incertidumbre.', 'Licenciado en Actuaría con orientación en Economía o Actuario en Economía.', 'Licenciatura'),
(79, 'Licenciatura en Psicología', 'Proporcionar una aproximación científica a los problemas de la psicología a través de una formación y capacitación en las distintas áreas y campos que favorezcan las opciones del alumno en su práctica futura como graduado.', 'Licenciado en Psicología', 'Licenciatura'),
(80, 'Licenciatura en Musicoterapia', 'El licenciado en Musicoterapia es un profesional de la salud con sólida formación científica, basada en el corpus de conocimientos propios y específicos disciplinares, en la formación musical y en los conocimientos relativos al dominio de la Psicología y de la Fisiología (con énfasis en los aspectos neurológicos) necesarios para el abordaje de su objeto y campo de estudio.', 'Licenciado en Musicoterapia', 'Licenciatura'),
(81, 'Licenciatura en Terapia Ocupacional', 'Tiene como objetivo analizar e instrumentar las ocupaciones del hombre relacionadas con el desempeño en las áreas de Automantenimiento, Productividad y Tiempo Libre, para promover, mantener y recuperar la salud. Desarrolla acciones de prevención, rehabilitación y equiparación en las áreas de Salud, Trabajo, Seguridad Social, Educación Especial y en el ámbito de la comunidad. Acción Social.', 'Licenciado en Terapia Ocupacional', 'Licenciatura'),
(82, 'Profesorado de Enseñanza Media y Superior en Psicología', 'Posibilitar el conocimiento y análisis de los supuestos teóricos y metodológicos que sustentan las prácticas educativas. Apropiarse de las herramientas conceptuales, metodológicas y técnicas necesarias para el ejercicio de la docencia en los niveles medio y superior. Reflexionar sobre el sentido, función y alcance de la enseñanza de la Psicología en los niveles medio y superior y en las diversas modalidades constitutivas de esos niveles. Analizar el marco social e institucional en el que se desarrolla la práctica docente y asumir una actitud reflexiva ante su propia práctica.', 'Profesor de Enseñanza Media y Superior en Psicología', 'Profesorado'),
(83, 'Licenciatura en Relaciones del Trabajo', 'La Licenciatura en Relaciones del Trabajo brinda una formación interdisciplinaria, que respetando la complejidad de su objeto de estudio aborda la diversidad de perspectivas que lo constituyen: social, económica, jurídica y administrativa. Promueve de manera conjunta e integrada el desarrollo de profesionales e investigadores de las diferentes configuraciones del mundo del trabajo. Así, se ha generado un diseño curricular que contempla un conjunto de asignaturas para construir este perfil académico – profesional.', 'Licenciado en Relaciones del Trabajo', 'Licenciatura'),
(84, 'Tecnicatura Superior en Turismo', 'Página en proceso', 'Técnico Superior en Tursimo', 'Tecnicatura'),
(85, 'Tecnicatura Superior en Logística', 'Página en proceso', 'Técnico Superior en Logística', 'Tecnicatura'),
(86, 'Tecnicatura Superior en Hotelería', 'Página en proceso', 'Técnico Superior en Hotelería', 'Tecnicatura'),
(87, 'Tecnicatura Superior en Administración de Recursos Humanos', 'Página en proceso', 'Técnico Superior en Administración de Recursos Humanos', 'Tecnicatura'),
(88, 'Profesorado de Educación Secundaria Técnico Profesional en Industrias de procesos y de Alimentos', 'El Profesorado de Educación Secundaria Técnico Profesional en Industrias de Procesos y de Alimentos permitirá a quien egrese articular los saberes propios del campo profesional y pedagógicos de la Educación Técnico Profesional abordando la enseñanza en diálogo con el entorno social, político, cultural y académico', 'Profesor de Educación Secundaria Técnico Profesional en Industrias de procesos y de Alimentos', 'Profesorado'),
(89, 'Profesorado de Educación Secundaria en Tecnologías (de Equipos e Instalaciones Electromecánicas)', 'Página en proceso', 'Profesor de Educación Secundaria en Tecnologías', 'Profesorado'),
(90, 'Profesorado en Economía', 'Página en proceso', 'Profesor en Economía', 'Profesorado'),
(101, 'Gestión de emprendimientos turísticos', 'Formación en la creación y administración de negocios turísticos con un enfoque estratégico y sostenible.', 'Diplomado en Gestión de Emprendimientos Turísticos', 'Diplomatura'),
(102, 'Manejo de incendios forestales y restauración de ecosistemas', 'Capacitación en la prevención, control y manejo de incendios forestales, así como en la restauración de ecosistemas afectados.', 'Diplomado en Manejo de Incendios Forestales y Restauración de Ecosistemas', 'Diplomatura'),
(103, 'Estrategias de marketing para empresas turísticas', 'Desarrollo de habilidades en la planificación y ejecución de estrategias de marketing orientadas al sector turístico.', 'Diplomado en Estrategias de Marketing para Empresas Turísticas', 'Diplomatura'),
(104, 'Gestión del desarrollo territorial sostenible', 'Estudios enfocados en la gestión y planificación del desarrollo territorial desde una perspectiva sostenible y equitativa.', 'Diplomado en Gestión del Desarrollo Territorial Sostenible', 'Diplomatura'),
(105, 'Desarrollo emprendedor y empresarial', 'Formación integral en emprendimiento, innovación y desarrollo empresarial.', 'Diplomado en Desarrollo Emprendedor y Empresarial', 'Diplomatura'),
(106, 'Educación en contextos de vulnerabilidad', 'Capacitación en la enseñanza y gestión educativa en contextos de vulnerabilidad social y económica.', 'Diplomado en Educación en Contextos de Vulnerabilidad', 'Diplomatura'),
(107, 'Seguridad social', 'Estudio de los sistemas de seguridad social y su implementación en diferentes contextos.', 'Diplomado en Seguridad Social', 'Diplomatura'),
(108, 'Negocios digitales e innovación', 'Formación en la creación y gestión de negocios digitales con un enfoque en la innovación tecnológica.', 'Diplomado en Negocios Digitales e Innovación', 'Diplomatura'),
(109, 'Redes informáticas y comunicación de datos', 'Estudios sobre el diseño, implementación y gestión de redes informáticas y sistemas de comunicación de datos.', 'Diplomado en Redes Informáticas y Comunicación de Datos', 'Diplomatura'),
(110, 'Tecnicatura Superior en Energía Eléctrica con orientación en Digitalización', 'Formación técnica superior en sistemas eléctricos con énfasis en la digitalización y automatización.', 'Técnico Superior en Energía Eléctrica con orientación en Digitalización', 'Tecnicatura'),
(113, 'Tecnicatura Universitaria en Sistemas Informáticos', 'Formación técnica universitaria en el desarrollo, administración y soporte de sistemas informáticos.', 'Técnico Universitario en Sistemas Informáticos', 'Tecnicatura'),
(114, 'Formación Profesional de Carrera de Enfermería', 'Capacitación profesional para el ejercicio de la enfermería en centros de salud y hospitales.', 'Enfermero Profesional', 'Tecnicatura'),
(115, 'Tecnicatura Superior en Realización de Cine, TV y Video', 'Formación técnica en la producción y dirección de proyectos audiovisuales en cine, televisión y video.', 'Técnico Superior en Realización de Cine, TV y Video', 'Tecnicatura'),
(116, 'Tecnicatura Superior en Comunicación Social para el Desarrollo', 'Enseñanza sobre el uso de la comunicación como herramienta para el desarrollo social y comunitario.', 'Técnico Superior en Comunicación Social para el Desarrollo', 'Tecnicatura'),
(117, 'Tecnicatura Superior en Diseño de Interiores', 'Formación técnica en el diseño de espacios interiores para mejorar la funcionalidad y estética.', 'Técnico Superior en Diseño de Interiores', 'Tecnicatura'),
(118, 'Licenciatura en Economía y Administración Agrarias', 'Carrera enfocada en la economía y administración de actividades agrarias.', 'Licenciado en Economía y Administración Agrarias', 'Licenciatura'),
(119, 'Licenciatura en Ciencias Ambientales', 'Estudios centrados en las ciencias ambientales aplicadas a la agronomía.', 'Licenciado en Ciencias Ambientales', 'Licenciatura'),
(120, 'Profesorado en Enseñanza Secundaria y Superior en Ciencias Ambientales', 'Formación de profesionales para la enseñanza de ciencias ambientales en nivel secundario y superior.', 'Profesor en Enseñanza Secundaria y Superior en Ciencias Ambientales', 'Profesorado'),
(121, 'Tecnicatura Universitaria en Turismo Rural', 'Programa técnico enfocado en el desarrollo del turismo rural y sus aplicaciones económicas.', 'Técnico Universitario en Turismo Rural', 'Tecnicatura'),
(122, 'Tecnicatura Universitaria en Producción Florihortícola', 'Carrera técnica orientada a la producción de cultivos florales y hortícolas.', 'Técnico Universitario en Producción Florihortícola', 'Tecnicatura'),
(123, 'Tecnicatura Universitaria en Jardinería', 'Formación técnica para el diseño y mantenimiento de jardines.', 'Técnico Universitario en Jardinería', 'Tecnicatura'),
(124, 'Tecnicatura Universitaria en Producción Vegetal Orgánica', 'Carrera técnica especializada en la producción vegetal orgánica.', 'Técnico Universitario en Producción Vegetal Orgánica', 'Tecnicatura'),
(125, 'Diseño Gráfico', 'Estudios en diseño gráfico aplicado a diferentes campos de comunicación visual.', 'Diseñador Gráfico', 'Licenciatura'),
(126, 'Diseño Industrial', 'Carrera orientada a la creación de objetos y productos industriales.', 'Diseñador Industrial', 'Licenciatura'),
(127, 'Diseño de Imagen y Sonido', 'Estudios relacionados con la creación y edición de imágenes y sonido para medios audiovisuales.', 'Diseñador de Imagen y Sonido', 'Licenciatura'),
(128, 'Licenciatura en Planificación y Diseño del Paisaje', 'Formación en planificación y diseño del paisaje, incluyendo áreas urbanas y naturales.', 'Licenciado en Planificación y Diseño del Paisaje', 'Licenciatura'),
(129, 'Diseño de Indumentaria', 'Carrera enfocada en el diseño de indumentaria para la industria de la moda.', 'Diseñador de Indumentaria', 'Licenciatura'),
(130, 'Diseño Textil', 'Estudios en diseño y producción de textiles para la industria de la moda y otras áreas.', 'Diseñador Textil', 'Licenciatura'),
(131, 'Licenciatura en Ciencias Biológicas', 'Carrera orientada al estudio de organismos vivos y su funcionamiento.', 'Licenciado en Ciencias Biológicas', 'Licenciatura'),
(132, 'Licenciatura en Ciencias de la Computación', 'Estudios en ciencias de la computación y sus aplicaciones en diversas áreas.', 'Licenciado en Ciencias de la Computación', 'Licenciatura'),
(133, 'Licenciatura en Ciencias Físicas', 'Formación avanzada en física y sus diferentes ramas de investigación.', 'Licenciado en Ciencias Físicas', 'Licenciatura'),
(134, 'Profesorado en Enseñanza Media y Superior en Ciencias Geológicas', 'Carrera para la enseñanza de ciencias geológicas en el nivel medio y superior.', 'Profesor en Enseñanza Media y Superior en Ciencias Geológicas', 'Profesorado'),
(135, 'Licenciatura en Ciencias Matemáticas', 'Estudios en matemáticas y su aplicación en diversos campos científicos.', 'Licenciado en Ciencias Matemáticas', 'Licenciatura'),
(136, 'Licenciatura en Ciencias de la Atmósfera', 'Carrera enfocada en la atmósfera y el estudio de fenómenos meteorológicos.', 'Licenciado en Ciencias de la Atmósfera', 'Licenciatura'),
(137, 'Licenciatura en Ciencias Químicas', 'Formación en química y sus aplicaciones en investigación y tecnología.', 'Licenciado en Ciencias Químicas', 'Licenciatura'),
(138, 'Licenciatura en Ciencias Oceanográficas', 'Carrera especializada en el estudio de los océanos y sus ecosistemas.', 'Licenciado en Ciencias Oceanográficas', 'Licenciatura'),
(139, 'Licenciatura en Paleontología', 'Estudios en paleontología, centrados en la investigación de fósiles y evolución.', 'Licenciado en Paleontología', 'Licenciatura'),
(140, 'Profesorado en Enseñanza Media y Superior en Ciencias Biológicas', 'Formación en enseñanza de ciencias biológicas en nivel medio y superior.', 'Profesor en Enseñanza Media y Superior en Ciencias Biológicas', 'Profesorado'),
(141, 'Profesorado en Enseñanza Media y Superior en Ciencias de la Atmósfera', 'Carrera orientada a la enseñanza de ciencias de la atmósfera en el nivel secundario y superior.', 'Profesor en Enseñanza Media y Superior en Ciencias de la Atmósfera', 'Profesorado'),
(142, 'Profesorado en Enseñanza Media y Superior en Ciencias de la Computación', 'Formación para la enseñanza de computación en los niveles medio y superior.', 'Profesor en Enseñanza Media y Superior en Ciencias de la Computación', 'Profesorado'),
(143, 'Profesorado en Enseñanza Media y Superior en Física', 'Carrera para la enseñanza de física en los niveles medio y superior.', 'Profesor en Enseñanza Media y Superior en Física', 'Profesorado'),
(144, 'Profesorado en Enseñanza Media y Superior en Ciencias Geológicas', 'Carrera orientada a la enseñanza de ciencias geológicas en niveles medio y superior.', 'Profesor en Enseñanza Media y Superior en Ciencias Geológicas', 'Profesorado'),
(145, 'Profesorado en Enseñanza Media y Superior en Matemática', 'Formación en enseñanza de matemáticas en niveles medio y superior.', 'Profesor en Enseñanza Media y Superior en Matemática', 'Profesorado'),
(146, 'Profesorado en Enseñanza Media y Superior en Química', 'Carrera orientada a la enseñanza de química en niveles medio y superior.', 'Profesor en Enseñanza Media y Superior en Química', 'Profesorado'),
(147, 'Licenciatura en Ciencia y Tecnología de Alimentos', 'Carrera especializada en el estudio de alimentos y su tecnología de producción.', 'Licenciado en Ciencia y Tecnología de Alimentos', 'Licenciatura'),
(148, 'Licenciatura en Ciencias de Datos', 'Estudios avanzados en ciencias de datos y su aplicación en tecnología e investigación.', 'Licenciado en Ciencias de Datos', 'Licenciatura'),
(149, 'Licenciatura en Ciencias de la Computación', 'Estudio avanzado de los principios y aplicaciones de la informática y programación.', 'Licenciado en Ciencias de la Computación', 'Licenciatura'),
(150, 'Licenciatura en Matemáticas', 'Formación profunda en teorías y aplicaciones de las matemáticas puras y aplicadas.', 'Licenciado en Matemáticas', 'Licenciatura'),
(151, 'Tecnicatura en Programación', 'Estudios técnicos sobre lenguajes de programación y desarrollo de software.', 'Técnico en Programación', 'Tecnicatura'),
(152, 'Tecnicatura en Redes Informáticas', 'Formación técnica sobre la instalación, configuración y gestión de redes informáticas.', 'Técnico en Redes Informáticas', 'Tecnicatura'),
(153, 'Licenciatura en Física', 'Estudios avanzados sobre los principios y leyes de la física, tanto teórica como experimental.', 'Licenciado en Física', 'Licenciatura'),
(154, 'Tecnicatura en Electrónica', 'Formación técnica en circuitos, sistemas electrónicos y dispositivos de control.', 'Técnico en Electrónica', 'Tecnicatura'),
(155, 'Licenciatura en Ciencias Ambientales (LiCiA)', 'Estudios interdisciplinarios sobre el ambiente y su conservación, con un enfoque en la ciencia y gestión ambiental.', 'Licenciado en Ciencias Ambientales', 'Licenciatura'),
(156, 'Licenciatura en Economía y Administración Agrarias', 'Preparación en economía y gestión de empresas agrarias, con un enfoque en la producción agropecuaria.', 'Licenciado en Economía y Administración Agrarias', 'Licenciatura'),
(157, 'Licenciatura en Gestión de Agroalimentos', 'Formación en la gestión integral de sistemas agroalimentarios, desde la producción hasta la comercialización.', 'Licenciado en Gestión de Agroalimentos', 'Licenciatura'),
(158, 'Licenciatura en Planificación y Diseño del Paisaje', 'Enseñanza sobre el diseño y la planificación de paisajes urbanos y rurales, con un enfoque estético y ecológico.', 'Licenciado en Planificación y Diseño del Paisaje', 'Licenciatura'),
(159, 'Tecnicatura en Floricultura', 'Formación técnica para la producción y gestión de plantas ornamentales y flores, con un enfoque en la comercialización.', 'Técnico en Floricultura', 'Tecnicatura'),
(160, 'Tecnicatura en Jardinería', 'Enseñanza técnica sobre el diseño, mantenimiento y gestión de jardines y espacios verdes.', 'Técnico en Jardinería', 'Tecnicatura'),
(161, 'Licenciatura en Ciencias de la Salud', 'Formación en ciencias médicas, biología humana, y salud pública.', 'Licenciado en Ciencias de la Salud', 'Licenciatura'),
(162, 'Licenciatura en Enfermería', 'Estudios enfocados en la atención al paciente y los cuidados de salud, tanto en hospitales como en la comunidad.', 'Licenciado en Enfermería', 'Licenciatura'),
(163, 'Tecnicatura Universitaria en Radiología', 'Formación técnica en el uso de equipos de imagenología médica como rayos X, tomografías, y resonancias.', 'Técnico Universitario en Radiología', 'Tecnicatura'),
(164, 'Tecnicatura en Laboratorio Clínico', 'Estudios técnicos sobre análisis clínicos y el manejo de laboratorios médicos.', 'Técnico en Laboratorio Clínico', 'Tecnicatura'),
(165, 'Licenciatura en Kinesiología y Fisiatría', 'Formación especializada en rehabilitación física y tratamiento del dolor y movilidad.', 'Licenciado en Kinesiología y Fisiatría', 'Licenciatura'),
(166, 'Licenciatura en Terapia Ocupacional', 'Estudios enfocados en ayudar a personas a mejorar sus habilidades diarias y profesionales mediante terapias ocupacionales.', 'Licenciado en Terapia Ocupacional', 'Licenciatura'),
(167, 'Licenciatura en Derecho', 'Formación en ciencias jurídicas, con especialización en distintas ramas del derecho como civil, penal, y laboral.', 'Abogado', 'Licenciatura'),
(168, 'Licenciatura en Criminología', 'Estudios interdisciplinarios sobre el comportamiento criminal, sistemas de justicia penal, y prevención del delito.', 'Licenciado en Criminología', 'Licenciatura'),
(169, 'Tecnicatura en Seguridad e Higiene', 'Formación técnica sobre prevención de riesgos laborales y seguridad industrial.', 'Técnico en Seguridad e Higiene', 'Tecnicatura'),
(170, 'Licenciatura en Relaciones Internacionales', 'Estudios sobre la política internacional, economía global, y relaciones diplomáticas entre naciones.', 'Licenciado en Relaciones Internacionales', 'Licenciatura'),
(171, 'Licenciatura en Trabajo Social', 'Formación en intervención social, trabajo comunitario y gestión de políticas sociales.', 'Licenciado en Trabajo Social', 'Licenciatura'),
(172, 'Tecnicatura en Mediación y Resolución de Conflictos', 'Formación técnica en la mediación de conflictos en contextos sociales, familiares o laborales.', 'Técnico en Mediación y Resolución de Conflictos', 'Tecnicatura'),
(173, 'Licenciatura en Psicología', 'Formación en el estudio del comportamiento humano, procesos mentales y terapias psicológicas.', 'Licenciado en Psicología', 'Licenciatura'),
(174, 'Licenciatura en Comunicación Social', 'Estudios en medios de comunicación, periodismo, y relaciones públicas.', 'Licenciado en Comunicación Social', 'Licenciatura'),
(175, 'Licenciatura en Ciencias Políticas', 'Formación en análisis político, sistemas de gobierno, y teorías de la ciencia política.', 'Licenciado en Ciencias Políticas', 'Licenciatura'),
(176, 'Tecnicatura en Diseño Gráfico', 'Estudios técnicos sobre la creación de contenido visual para medios impresos y digitales.', 'Técnico en Diseño Gráfico', 'Tecnicatura'),
(177, 'Tecnicatura en Marketing Digital', 'Formación en estrategias de marketing a través de plataformas digitales, incluyendo SEO y publicidad online.', 'Técnico en Marketing Digital', 'Tecnicatura'),
(178, 'Licenciatura en Historia', 'Estudios en la evolución de las sociedades humanas a lo largo del tiempo, con énfasis en análisis crítico y metodologías históricas.', 'Licenciado en Historia', 'Licenciatura'),
(179, 'Licenciatura en Filosofía', 'Estudios en el análisis del pensamiento humano, ética, lógica y metafísica.', 'Licenciado en Filosofía', 'Licenciatura'),
(180, 'Licenciatura en Sociología', 'Formación en el estudio científico de las estructuras sociales, relaciones humanas y comportamientos colectivos.', 'Licenciado en Sociología', 'Licenciatura'),
(181, 'Tecnicatura en Administración de Empresas', 'Estudios técnicos en gestión empresarial, finanzas, y recursos humanos.', 'Técnico en Administración de Empresas', 'Tecnicatura'),
(182, 'Tecnicatura en Gestión de Recursos Humanos', 'Formación técnica en la gestión del capital humano dentro de las organizaciones, enfocada en selección, desarrollo y retención de talentos.', 'Técnico en Gestión de Recursos Humanos', 'Tecnicatura'),
(183, 'Licenciatura en Antropología', 'Estudios sobre la diversidad cultural, social y biológica de los seres humanos.', 'Licenciado en Antropología', 'Licenciatura'),
(184, 'Tecnicatura en Comercio Internacional', 'Formación técnica en los procesos comerciales globales, aduanas, y logística internacional.', 'Técnico en Comercio Internacional', 'Tecnicatura'),
(185, 'Licenciatura en Relaciones Internacionales', 'Formación en política exterior, diplomacia, y relaciones internacionales.', 'Licenciado en Relaciones Internacionales', 'Licenciatura'),
(186, 'Licenciatura en Educación Física', 'Estudios en la enseñanza de actividades físicas y deportivas, así como en la promoción de la salud.', 'Licenciado en Educación Física', 'Licenciatura'),
(187, 'Tecnicatura en Turismo', 'Formación técnica en la planificación, desarrollo y gestión de actividades turísticas.', 'Técnico en Turismo', 'Tecnicatura'),
(188, 'Tecnicatura en Desarrollo de Software', 'Estudios técnicos en programación, desarrollo de aplicaciones y soluciones de software.', 'Técnico en Desarrollo de Software', 'Tecnicatura'),
(189, 'Licenciatura en Ciencias de la Educación', 'Formación en teorías educativas, políticas educativas y prácticas de enseñanza.', 'Licenciado en Ciencias de la Educación', 'Licenciatura'),
(190, 'Tecnicatura en Logística', 'Formación técnica en gestión de la cadena de suministro, transporte y distribución de productos.', 'Técnico en Logística', 'Tecnicatura'),
(191, 'Licenciatura en Trabajo Social', 'Estudios orientados a la intervención en problemáticas sociales y al apoyo en el bienestar de individuos y comunidades.', 'Licenciado en Trabajo Social', 'Licenciatura'),
(192, 'Licenciatura en Matemáticas', 'Formación en el estudio de las matemáticas puras y aplicadas, con énfasis en análisis, álgebra y geometría.', 'Licenciado en Matemáticas', 'Licenciatura'),
(193, 'Licenciatura en Geografía', 'Estudios en la interacción entre el hombre y su entorno natural, analizando espacios geográficos y dinámicas territoriales.', 'Licenciado en Geografía', 'Licenciatura'),
(194, 'Tecnicatura en Gestión Ambiental', 'Formación técnica en la evaluación y gestión de recursos naturales y en políticas ambientales.', 'Técnico en Gestión Ambiental', 'Tecnicatura'),
(195, 'Tecnicatura en Mantenimiento Industrial', 'Estudios técnicos sobre la gestión y mantenimiento de sistemas industriales y maquinaria.', 'Técnico en Mantenimiento Industrial', 'Tecnicatura'),
(196, 'Licenciatura en Ciencias de la Computación', 'Formación en teoría computacional, algoritmos, y desarrollo de software avanzado.', 'Licenciado en Ciencias de la Computación', 'Licenciatura'),
(197, 'Tecnicatura en Seguridad e Higiene', 'Formación técnica en la prevención de riesgos laborales y en la implementación de normativas de seguridad e higiene.', 'Técnico en Seguridad e Higiene', 'Tecnicatura'),
(198, 'Licenciatura en Filosofía', 'Estudios en el análisis y discusión de teorías filosóficas, la ética, la lógica y la historia de la filosofía.', 'Licenciado en Filosofía', 'Licenciatura'),
(199, 'Licenciatura en Economía', 'Formación en teorías económicas, macro y microeconomía, análisis financiero y política económica.', 'Licenciado en Economía', 'Licenciatura'),
(200, 'Tecnicatura en Diseño Gráfico', 'Estudios técnicos en diseño visual, tipografía, ilustración y diseño digital para comunicación visual.', 'Técnico en Diseño Gráfico', 'Tecnicatura'),
(201, 'Tecnicatura en Administración de Empresas', 'Formación técnica en gestión empresarial, finanzas, recursos humanos y planificación estratégica.', 'Técnico en Administración de Empresas', 'Tecnicatura'),
(202, 'Licenciatura en Psicopedagogía', 'Estudios centrados en el análisis y tratamiento de dificultades de aprendizaje y el desarrollo educativo de los individuos.', 'Licenciado en Psicopedagogía', 'Licenciatura'),
(203, 'Licenciatura en Ingeniería Electrónica', 'Formación en diseño y desarrollo de sistemas electrónicos, circuitos y dispositivos de alta tecnología.', 'Ingeniero en Electrónica', 'Licenciatura'),
(204, 'Licenciatura en Ingeniería Mecánica', 'Estudios en diseño, análisis y construcción de sistemas mecánicos y maquinaria.', 'Ingeniero en Mecánica', 'Licenciatura'),
(205, 'Tecnicatura en Biotecnología', 'Formación técnica en la investigación y aplicación de procesos biológicos y tecnologías en industrias.', 'Técnico en Biotecnología', 'Tecnicatura'),
(206, 'Licenciatura en Ciencias Políticas', 'Estudios en el análisis del poder, sistemas políticos y relaciones internacionales.', 'Licenciado en Ciencias Políticas', 'Licenciatura'),
(207, 'Tecnicatura en Administración Pública', 'Formación técnica en gestión de políticas públicas y en la administración de recursos del Estado.', 'Técnico en Administración Pública', 'Tecnicatura'),
(208, 'Licenciatura en Antropología', 'Estudios sobre las culturas humanas, su evolución, y sus diversas manifestaciones a lo largo de la historia.', 'Licenciado en Antropología', 'Licenciatura'),
(209, 'Licenciatura en Ciencias de Datos', 'Estudios avanzados en ciencias de datos y su aplicación en diversos sectores.', 'Licenciado en Ciencias de Datos', 'Licenciatura'),
(302, 'Licenciatura en Ciencias de Datos', 'Estudios avanzados en ciencias de datos y su aplicación en diversos sectores.', 'Licenciado en Ciencias de Datos', 'Licenciatura'),
(303, 'Agronomía', 'La Agronomía se ocupa de la producción de alimentos y la gestión de recursos naturales.', 'Licenciado en Agronomía', 'Licenciatura'),
(304, 'Licenciatura en Ciencias Ambientales (LiCiA)', 'Estudios sobre la protección del medio ambiente y la gestión de recursos naturales.', 'Licenciado en Ciencias Ambientales', 'Licenciatura');
INSERT INTO `carrera` (`id_carrera`, `nombre`, `descripcion`, `titulo`, `tipo_carrera`) VALUES
(305, 'Licenciatura en Economía y Administración Agrarias', 'Formación en economía aplicada al sector agrícola y la gestión de empresas agrarias.', 'Licenciado en Economía y Administración Agrarias', 'Licenciatura'),
(306, 'Licenciatura en Gestión de Agroalimentos (compartido)', 'Estudio y gestión de la producción y comercialización de agroalimentos.', 'Licenciado en Gestión de Agroalimentos', 'Licenciatura'),
(307, 'Licenciatura en Planificación y Diseño del Paisaje', 'Especialización en la planificación y diseño de espacios exteriores.', 'Licenciado en Planificación y Diseño del Paisaje', 'Licenciatura'),
(308, 'Tecnicatura en Floricultura', 'Formación técnica en el cultivo y manejo de flores.', 'Técnico en Floricultura', 'Tecnicatura'),
(309, 'Tecnicatura en Jardinería', 'Formación técnica en diseño y mantenimiento de jardines.', 'Técnico en Jardinería', 'Tecnicatura'),
(310, 'Tecnicatura en Producción Vegetal Orgánica', 'Formación técnica en cultivo de plantas mediante prácticas orgánicas.', 'Técnico en Producción Vegetal Orgánica', 'Tecnicatura'),
(311, 'Tecnicatura en Turismo Rural', 'Capacitación en gestión de actividades turísticas en áreas rurales.', 'Técnico en Turismo Rural', 'Tecnicatura'),
(312, 'Martillero y Corredor Público Rural', 'Formación en la intermediación de transacciones rurales.', 'Martillero y Corredor Público Rural', 'Tecnicatura'),
(313, 'Profesorado de Enseñanza Secundaria y Superior en Ciencias Naturales', 'Formación para la enseñanza de ciencias naturales en niveles secundario y superior.', 'Profesor en Ciencias Naturales', 'Profesorado'),
(314, 'Arquitectura', 'Diseño y construcción de edificios y estructuras.', 'Arquitecto', 'Licenciatura'),
(315, 'Diseño Gráfico', 'Creación de elementos visuales para comunicación gráfica.', 'Diseñador Gráfico', 'Licenciatura'),
(316, 'Diseño Industrial', 'Diseño y desarrollo de productos industriales.', 'Diseñador Industrial', 'Licenciatura'),
(317, 'Diseño de Imagen y Sonido', 'Creación y gestión de contenidos visuales y sonoros.', 'Diseñador de Imagen y Sonido', 'Licenciatura'),
(318, 'Lic. en Planificación y Diseño del Paisaje', 'Estudio y gestión de espacios exteriores y paisajísticos.', 'Licenciado en Planificación y Diseño del Paisaje', 'Licenciatura'),
(319, 'Diseño de Indumentaria', 'Creación y diseño de vestimenta y accesorios.', 'Diseñador de Indumentaria', 'Licenciatura'),
(320, 'Diseño Textil', 'Desarrollo de tejidos y materiales textiles.', 'Diseñador Textil', 'Licenciatura'),
(321, 'Lic. en Ciencias Biológicas', 'Estudio de los seres vivos y sus interacciones.', 'Licenciado en Ciencias Biológicas', 'Licenciatura'),
(322, 'Lic. en Cs. de la Computación', 'Formación en el desarrollo y gestión de sistemas informáticos.', 'Licenciado en Ciencias de la Computación', 'Licenciatura'),
(323, 'Lic. en Cs. Físicas', 'Estudio de los principios fundamentales de la física.', 'Licenciado en Ciencias Físicas', 'Licenciatura'),
(324, 'Prof. enseñanza media y superior en Cs. Geológicas', 'Capacitación para la enseñanza de ciencias geológicas en niveles medio y superior.', 'Profesor en Ciencias Geológicas', 'Profesorado'),
(325, 'Lic. en Cs. Matemáticas', 'Estudio de las matemáticas y sus aplicaciones.', 'Licenciado en Ciencias Matemáticas', 'Licenciatura'),
(326, 'Lic. en Cs. de la Atmósfera', 'Estudio de la atmósfera y los fenómenos atmosféricos.', 'Licenciado en Ciencias de la Atmósfera', 'Licenciatura'),
(327, 'Lic. en Cs. Químicas', 'Estudio de la química y sus aplicaciones.', 'Licenciado en Ciencias Químicas', 'Licenciatura'),
(328, 'Lic. en Cs. Oceanográficas', 'Estudio de los océanos y sus procesos.', 'Licenciado en Ciencias Oceanográficas', 'Licenciatura'),
(329, 'Lic. en Paleontología', 'Estudio de los fósiles y la historia de la vida en la Tierra.', 'Licenciado en Paleontología', 'Licenciatura'),
(330, 'Prof. de Enseñanza Media y Superior en Cs. Biológicas', 'Formación para la enseñanza de ciencias biológicas en niveles medio y superior.', 'Profesor en Ciencias Biológicas', 'Profesorado'),
(331, 'Prof. de Enseñanza Media y Superior en Cs. de la Atmósfera', 'Capacitación para la enseñanza de ciencias atmosféricas en niveles medio y superior.', 'Profesor en Ciencias de la Atmósfera', 'Profesorado'),
(332, 'Prof. de Enseñanza Media y Superior en Cs. de la Computación', 'Formación para la enseñanza de ciencias de la computación en niveles medio y superior.', 'Profesor en Ciencias de la Computación', 'Profesorado'),
(333, 'Prof. de Enseñanza Media y Superior en Física', 'Capacitación para la enseñanza de la física en niveles medio y superior.', 'Profesor en Física', 'Profesorado'),
(334, 'Prof. de Enseñanza Media y Superior en Cs. Geológicas', 'Formación para la enseñanza de ciencias geológicas en niveles medio y superior.', 'Profesor en Ciencias Geológicas', 'Profesorado'),
(335, 'Prof. de Enseñanza Media y Superior en Matemática', 'Capacitación para la enseñanza de matemáticas en niveles medio y superior.', 'Profesor en Matemáticas', 'Profesorado'),
(336, 'Prof. de Enseñanza Media y Superior en Química', 'Formación para la enseñanza de química en niveles medio y superior.', 'Profesor en Química', 'Profesorado'),
(337, 'Lic. en Ciencia y Tecnología de Alimentos', 'Estudio de la tecnología y gestión de alimentos.', 'Licenciado en Ciencia y Tecnología de Alimentos', 'Licenciatura'),
(338, 'Lic. en Ciencias de Datos', 'Formación en el análisis y gestión de grandes volúmenes de datos.', 'Licenciado en Ciencias de Datos', 'Licenciatura'),
(339, 'Lic. en Relaciones del Trabajo', 'Estudio de las relaciones laborales y la gestión de recursos humanos.', 'Licenciado en Relaciones del Trabajo', 'Licenciatura'),
(340, 'Lic. en Trabajo Social', 'Capacitación en intervención y apoyo social.', 'Licenciado en Trabajo Social', 'Licenciatura'),
(341, 'Sociología', 'Estudio de la sociedad y las relaciones humanas.', 'Licenciado en Sociología', 'Licenciatura'),
(342, 'Lic. en Ciencia Política', 'Formación en el análisis de sistemas políticos y gobernanza.', 'Licenciado en Ciencia Política', 'Licenciatura'),
(343, 'Lic. en Cs. de la Comunicación Social', 'Estudio de los procesos de comunicación y medios de comunicación.', 'Licenciado en Ciencias de la Comunicación Social', 'Licenciatura'),
(344, 'Veterinaria', 'Estudio y cuidado de la salud animal.', 'Licenciado en Veterinaria', 'Licenciatura'),
(345, 'Tec. Univ. en Gestión Integral de Bioterios', 'Formación en la gestión y manejo de bioterios.', 'Técnico Universitario en Gestión Integral de Bioterios', 'Tecnicatura'),
(346, 'Lic. en Gestión de Agroalimentos', 'Formación en la administración de agroalimentos.', 'Licenciado en Gestión de Agroalimentos', 'Licenciatura'),
(347, 'Abogacía', 'Estudio del derecho y su aplicación en la práctica legal.', 'Abogado', 'Licenciatura'),
(348, 'Calígrafo Público', 'Formación en caligrafía y escritura profesional.', 'Calígrafo Público', 'Licenciatura'),
(349, 'Traductorado Público', 'Formación en traducción e interpretación profesional.', 'Traductor Público', 'Licenciatura'),
(350, 'Prof. en Enseñanza Media y Superior en Cs. Jurídicas', 'Capacitación para la enseñanza de ciencias jurídicas en niveles medio y superior.', 'Profesor en Ciencias Jurídicas', 'Profesorado'),
(351, 'Bioquímica', 'Estudio de la química en organismos vivos.', 'Licenciado en Bioquímica', 'Licenciatura'),
(352, 'Farmacia', 'Formación en la gestión y preparación de medicamentos.', 'Licenciado en Farmacia', 'Licenciatura'),
(353, 'Tecnicatura Universitaria en Óptica y Contactología', 'Capacitación en óptica y adaptación de lentes de contacto.', 'Técnico Universitario en Óptica y Contactología', 'Tecnicatura'),
(354, 'Tecnicatura Universitaria en Medicina Nuclear', 'Formación técnica en técnicas de medicina nuclear.', 'Técnico Universitario en Medicina Nuclear', 'Tecnicatura'),
(355, 'Lic. en Terapia Ocupacional', 'Estudio y práctica de la terapia ocupacional para mejorar la calidad de vida.', 'Licenciado en Terapia Ocupacional', 'Licenciatura'),
(356, 'Prof. de Educación Inicial', 'Formación para la enseñanza en educación inicial.', 'Profesor de Educación Inicial', 'Profesorado'),
(358, 'Prof. en Lengua y Literatura', 'Formación para la enseñanza de lengua y literatura.', 'Profesor en Lengua y Literatura', 'Profesorado'),
(359, 'Prof. en Matemáticas', 'Capacitación para la enseñanza de matemáticas.', 'Profesor en Matemáticas', 'Profesorado'),
(360, 'Prof. en Ciencias Naturales', 'Formación para la enseñanza de ciencias naturales.', 'Profesor en Ciencias Naturales', 'Profesorado'),
(361, 'Prof. en Ciencias Sociales', 'Capacitación para la enseñanza de ciencias sociales.', 'Profesor en Ciencias Sociales', 'Profesorado'),
(362, 'Profesor de Educación Inicial y Primaria', 'Formación para la enseñanza en educación inicial y primaria.', 'Profesor de Educación Inicial y Primaria', 'Profesorado'),
(363, 'Ingeniería en Agrimensura', 'Página en proceso', 'Ingeniero Agrimensor', 'Ingeniería'),
(364, 'Ingeniería Industrial', 'Formación en la optimización de procesos industriales, gestión de recursos y mejora de sistemas productivos.', 'Ingeniero Industrial', 'Ingeniería'),
(365, 'Ingeniería en Alimentos', 'Estudio y desarrollo de procesos de producción, conservación y control de calidad en la industria alimentaria.', 'Ingeniero en Alimentos', 'Ingeniería'),
(366, 'Ingeniería Electrónica', 'Especialización en el diseño, desarrollo y mantenimiento de sistemas electrónicos y automatización.', 'Ingeniero Electrónico', 'Ingeniería'),
(367, 'Ingeniería Informática', 'Formación en el desarrollo de sistemas informáticos, software y gestión de tecnologías de la información.', 'Ingeniero en Informática', 'Ingeniería'),
(368, 'Ingeniería Naval Mecánica', 'Estudio y desarrollo de sistemas de propulsión y estructuras navales.', 'Ingeniero Naval Mecánico', 'Licenciatura'),
(369, 'Ingeniería Petrolera', 'Capacitación en la exploración, extracción y gestión de recursos petroleros y gasíferos.', 'Ingeniero Petrolero', 'Ingeniería'),
(370, 'Ingeniería Química', 'Estudio de los procesos químicos para la producción de bienes y servicios industriales.', 'Ingeniero Químico', 'Ingeniería'),
(371, 'Licenciatura en Análisis de Sistemas', 'Formación en el análisis, diseño y gestión de sistemas informáticos para la resolución de problemas organizacionales.', 'Licenciado en Análisis de Sistemas', 'Licenciatura'),
(372, 'Bibliotecología y Ciencia de la Información', 'Formación en la organización, gestión y acceso a la información en bibliotecas y otros servicios documentales.', 'Licenciado en Bibliotecología y Ciencia de la Información', 'Tecnicatura'),
(373, 'Edición', 'Capacitación en la edición de textos y producción de materiales editoriales para publicaciones impresas y digitales.', 'Licenciado en Edición', 'Tecnicatura'),
(374, 'Ciencias de la Educación', 'Estudio del proceso educativo, desde la enseñanza y el aprendizaje hasta la administración y gestión de instituciones educativas.', 'Licenciado en Ciencias de la Educación', 'Licenciatura'),
(375, 'Licenciatura en Artes', 'Formación en historia, teoría y crítica del arte, con énfasis en las artes plásticas, visuales y performáticas.', 'Licenciado en Artes', 'Licenciatura'),
(376, 'Licenciatura en Letras', 'Estudio de la lengua, literatura y lingüística, con un enfoque en la crítica y análisis textual.', 'Licenciado en Letras', 'Licenciatura'),
(377, 'Odontología', 'Formación en el diagnóstico, tratamiento y prevención de las enfermedades y trastornos dentales y bucales.', 'Odontólogo', 'Otros'),
(378, 'Lic. en Fonoaudiología', 'Carrera orientada al estudio y tratamiento de los trastornos de la audición, voz y lenguaje.', 'Licenciado en Fonoaudiología', 'Licenciatura'),
(379, 'Lic. en Kinesiología y Fisiatría', 'Carrera enfocada en la rehabilitación física y el tratamiento de lesiones musculoesqueléticas.', 'Licenciado en Kinesiología y Fisiatría', 'Licenciatura'),
(380, 'Medicina', 'Formación integral en ciencias médicas para el diagnóstico y tratamiento de enfermedades en humanos.', 'Médico', 'Otros'),
(381, 'Lic. en Nutrición', 'Carrera que abarca el estudio de la alimentación y nutrición humana en salud y enfermedad.', 'Licenciado en Nutrición', 'Licenciatura'),
(382, 'Lic. en Obstetricia', 'Estudio del embarazo, parto y puerperio, así como el cuidado integral de la mujer embarazada.', 'Licenciado en Obstetricia', 'Licenciatura'),
(383, 'Enfermero Universitario', 'Carrera orientada a la formación de profesionales en el cuidado integral de pacientes en diversas áreas.', 'Enfermero Universitario', 'Licenciatura'),
(384, 'Tec. Univ. en Podología', 'Formación técnica en el cuidado y tratamiento de las afecciones del pie.', 'Técnico Universitario en Podología', 'Tecnicatura'),
(385, 'Téc. Radiólogo Universitario', 'Carrera técnica para la obtención y manejo de imágenes radiológicas en el ámbito médico.', 'Técnico Radiólogo Universitario', 'Tecnicatura'),
(386, 'Lic. en Producción de Bioimágenes', 'Estudio especializado en la producción y tratamiento de imágenes médicas.', 'Licenciado en Producción de Bioimágenes', 'Licenciatura'),
(387, 'Tec. Univ. en Hemoterapia e Inmunohematología', 'Carrera técnica orientada al manejo de sangre y componentes sanguíneos para transfusiones.', 'Técnico Universitario en Hemoterapia e Inmunohematología', 'Tecnicatura'),
(388, 'Lic. en Enfermería', 'Carrera enfocada en el cuidado de pacientes y la promoción de la salud en diferentes contextos.', 'Licenciado en Enfermería', 'Licenciatura'),
(389, 'Tec. Univ. en Cosmetología Facial y Corporal', 'Formación técnica en el tratamiento estético de la piel a nivel facial y corporal.', 'Técnico Universitario en Cosmetología Facial y Corporal', 'Tecnicatura'),
(390, 'Tec. Univ. en Instrumentación Quirúrgica', 'Carrera técnica en la gestión y asistencia en procedimientos quirúrgicos.', 'Técnico Universitario en Instrumentación Quirúrgica', 'Tecnicatura'),
(391, 'Tec. Univ. en Prácticas Cardiológicas', 'Formación técnica en el manejo de prácticas diagnósticas y terapéuticas relacionadas con el corazón.', 'Técnico Universitario en Prácticas Cardiológicas', 'Tecnicatura'),
(392, 'Prof. de Enseñanza Media y Superior en Filosofía', 'Carrera orientada a la formación de profesores en Filosofía para la enseñanza en nivel medio y superior.', 'Profesor de Enseñanza Media y Superior en Filosofía', 'Profesorado'),
(394, 'Profesorado en Enseñanza Secundaria y Superior en Artes', 'Carrera enfocada en la formación de profesores en artes para la enseñanza en nivel secundario y superior.', 'Profesor de Enseñanza Secundaria y Superior en Artes', 'Profesorado'),
(395, 'Profesorado de Enseñanza Secundaria y Superior en Geografía', 'Formación de profesores de Geografía para impartir clases en niveles secundarios y superiores.', 'Profesor de Enseñanza Secundaria y Superior en Geografía', 'Profesorado'),
(396, 'Tecnicatura Universitaria en Anestesia', 'La Tecnicatura Universitaria en Anestesia capacita a profesionales para asistir a médicos anestesiólogos en la administración de anestésicos y monitorización de pacientes durante cirugías. Forman parte del equipo quirúrgico, encargados del manejo de equipos anestésicos y soporte vital.', 'Técnico Universitario en Anestesia', 'Tecnicatura'),
(397, 'Profesorado en Enseñanza Secundaria y Superior en Ciencias de la Educación', 'Forma docentes para enseñanza en Ciencias de la Educación en niveles medio y superior.', 'Profesor/a en Ciencias de la Educación', 'Profesorado'),
(398, 'Profesor/a de Enseñanza Media y Superior en Ciencias Antropológicas', 'Prepara profesionales para enseñar Ciencias Antropológicas en niveles medio y superior.', 'Profesor/a en Ciencias Antropológicas', 'Profesorado'),
(399, 'Profesor/a de Enseñanza Media y Superior en Historia', 'Capacita docentes para impartir Historia en niveles medio y superior.', 'Profesor/a en Historia', 'Profesorado'),
(400, 'Profesorado de Enseñanza Secundaria y Superior en Letras', 'Forma profesionales para la enseñanza de Letras en niveles medio y superior.', 'Profesor/a en Letras', 'Profesorado'),
(401, 'Profesorado en Enseñanza Secundaria y Superior en Artes', 'Capacita docentes para la enseñanza de las Artes en niveles medio y superior.', 'Profesor/a en Artes', 'Profesorado'),
(402, 'Profesorado de Enseñanza Media y Superior en Ciencias de la Comunicación', 'Prepara docentes para la enseñanza en Ciencias de la Comunicación en niveles medio y superior.', 'Profesor/a en Ciencias de la Comunicación', 'Profesorado'),
(403, 'Profesorado de Enseñanza Media y Superior en Ciencia Política', 'Forma docentes para enseñar Ciencia Política en niveles medio y superior.', 'Profesor/a en Ciencia Política', 'Profesorado'),
(404, 'Profesorado de Enseñanza Media y Superior en Relaciones del Trabajo', 'Capacita docentes para enseñar Relaciones del Trabajo en niveles medio y superior.', 'Profesor/a en Relaciones del Trabajo', 'Profesorado'),
(405, 'Profesor/a de Enseñanza Secundaria, Normal y Especial en Sociología', 'Prepara docentes para la enseñanza de Sociología en niveles medio, normal y especial.', 'Profesor/a en Sociología', 'Profesorado'),
(406, 'Profesorado de Enseñanza Media y Superior en Trabajo Social', 'Forma profesionales para la enseñanza en Trabajo Social en niveles medio y superior.', 'Profesor/a en Trabajo Social', 'Profesorado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tipo` enum('telefono','correo','tiktok','instagram','facebook','youtube','whatsapp','twitter') NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `fk_establecimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `descripcion`, `tipo`, `contacto`, `fk_establecimiento`) VALUES
(1, 'Teléfono para contactar a la UNSO', 'telefono', '11 4719-4718', 1),
(2, 'Facebook de la UNSO', 'facebook', 'https://www.facebook.com/unsanisidro/', 1),
(3, 'Instagram de la UNSO', 'instagram', 'https://www.instagram.com/unsanisidro/', 1),
(4, 'Youtube de la UNSO', 'youtube', 'https://www.youtube.com/c/unsivirtual', 1),
(5, 'Teléfono para contactar al instituto Nº220', 'telefono', '4756-6300', 2),
(6, 'Correro del instituto Nº220', 'correo', 'institutosuperior220@gmail.com', 2),
(7, 'Instagram del instituto Nº220', 'instagram', 'instagram/isft220', 2),
(8, 'Facebook del instituto Nº220', 'facebook', 'facebook/isft220', 2),
(9, 'Teléfono para contactar al Instituto Superior de Formación Docente Nº229', 'telefono', '4-756-6300', 3),
(10, 'No se han encontrado contactos existentes', 'correo', 'sincontacto@gmail.com', 4),
(11, 'Teléfono para contactar al instituto Nº39', 'telefono', '011 4744 1222', 5),
(12, 'Facebook del instituto Nº117', 'facebook', 'https://m.facebook.com/ISFD117/', 5),
(13, 'WhatsApp para contactarse con la UTN', 'whatsapp', '11 7108 8357', 6),
(14, 'Facebook de la UTN de Pacheco', 'facebook', 'https://www.facebook.com/UTNRegionalPacheco', 6),
(15, 'Instagram de la UTN de Pacheco', 'instagram', 'https://www.instagram.com/utnpacheco', 6),
(16, 'Twitter de la UTN de Pacheco', 'twitter', 'https://x.com/utnfrgpprensa', 6),
(17, 'Telefono para contactar con el instituto Nº59', 'telefono', '11 4743 0415', 7),
(18, 'Instagram del Instituto Nº59', 'instagram', 'https://www.instagram.com/profesorado52.sanisidro?igsh=MW5qeGl1M2wzemVveA==\n', 7),
(19, 'Teléfono para contactar con el Centro Universitario de Vicente López', 'telefono', '11 4513-9873', 8),
(20, 'Instagram del Centro Universitario de Vicente López', 'instagram', 'https://www.instagram.com/centrouniversitariovl/', 8),
(21, 'Facebook del Centro Universitario de Vicente López', 'facebook', 'https://www.facebook.com/centrouniversitariovl', 8),
(22, 'Teléfono para contactarse con el Conservatorio Juan José Castro', 'telefono', '11 4513-2971', 9),
(23, 'Facebook del Conservatorio Juan José Castro', 'facebook', 'https://www.facebook.com/Conservatorio-Castro', 9),
(24, 'Teléfono para contactar al Instituto Nº199', 'telefono', '4736 0013', 10),
(25, 'Correo del Instituto Nº199', 'correo', 'isft199alumnos@gmail.com / isft199@gmail.com', 10),
(26, 'Instagram del Instituto Nº199', 'instagram', 'https://www.instagram.com/isft_199?igsh=bmU0djN6aGczN3ph', 10),
(27, 'YouTube del Instituto Nº199', 'youtube', 'https://youtube.com/@isft1992?si=wnLwT4QYxPxkRhuW', 10),
(28, 'Facebook del instituto Nº199', 'facebook', 'https://www.facebook.com/isft199', 10),
(29, 'Teléfono para contactar al instituto Nº77', 'telefono', '11 7736 1682', 11),
(30, 'Correo para contactar al instituto Nº77', 'correo', 'isfdyt77prosecretaria@gmail.com', 11),
(31, 'Instagram del Instituto Nº77', 'instagram', 'https://www.instagram.com/isfdyt77/', 11),
(32, 'Twitter del Instituto Nº77', 'twitter', 'https://x.com/isfdyt77', 11),
(33, 'Teléfono para contactar al Polo de Educación Superior de Escobar', 'telefono', '(0348) 426-2830', 12),
(34, 'Instagram del Polo de Educación Superior de Escobar', 'instagram', 'https://www.instagram.com/pesescobar?igsh=eDIyYTBydXE0Z2Y1', 12),
(35, 'Facebook del Polo de Educación Superior de Escobar', 'facebook', 'https://www.facebook.com/PESEscobar/', 12),
(36, 'Twitter del Polo de Educación Superior de Escobar', 'twitter', 'https://x.com/escobar_pes?t=7OF1DfdEjxOJ7pN5VsFvPQ&s=09', 12),
(37, 'Teléfono para contactar al Centro Universitario de Tigre', 'telefono', '4512-4399', 13),
(38, 'Correo para contactarse con la Universidad Nacional del Delta', 'correo', 'info@undelta.edu.ar', 14),
(39, 'Teléfono para contactarse con la Universidad Nacional del Delta', 'telefono', '11 4575 3261', 14),
(40, 'Youtube de la Universidad Nacional del Delta', 'youtube', 'https://m.youtube.com/@universidaddelta', 14),
(41, 'Instagram de la Universidad Nacional del Delta', 'instagram', 'https://www.instagram.com/universidaddelta?igsh=anBvMzBtMDZiMGt0', 14),
(43, 'Correo de contacto con el CBC Sede San Isidro - UBA', 'correo', 'sedesanisidroalumnos@cbc.uba.ar', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id_distrito` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id_distrito`, `nombre`) VALUES
(1, 'Tigre'),
(2, 'San Fernando'),
(3, 'San Isidro'),
(4, 'Vicente Lopez'),
(5, 'Escobar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento`
--

CREATE TABLE `establecimiento` (
  `id_establecimiento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `descripcion` varchar(750) NOT NULL,
  `tipo_establecimiento` enum('Universidad','Instituto','Polo educativo','Centro universitario') NOT NULL,
  `servicios` varchar(4) NOT NULL,
  `coordenadas` longtext NOT NULL,
  `fk_distrito` int(11) NOT NULL,
  `habilitado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `establecimiento`
--

INSERT INTO `establecimiento` (`id_establecimiento`, `nombre`, `ubicacion`, `descripcion`, `tipo_establecimiento`, `servicios`, `coordenadas`, `fk_distrito`, `habilitado`) VALUES
(0, 'Ofertas de Educación Superior Región 6', '', 'Ahora es más fácil encontrar la universidad adecuada.', '', '', '', 1, 1),
(1, 'Universidad Nacional Raúl Scalabrini Ortiz', 'Juan Bautista de LaSalle 600', 'La Universidad Nacional Raúl Scalabrini Ortiz (UNSO) en San Isidro se destaca por su oferta académica innovadora en herramientas tecnológicas para comunicación, diseño y seguridad informática. Estas propuestas se suman a una oferta de carreras tradicionales en las áreas de Salud, Económicas y Humanidades. Como universidad pública, gratuita y de calidad en la región norte, ofrece carreras terciarias de tres años y de grado de cuatro a cinco años, nuestros estudiantes se forman en grupos reducidos y  de cercanía con los docentes. Todas las carreras están aprobadas por el Ministerio de Educación, garantizando un título oficial al graduarse.', 'Universidad', '1110', '{\"x\":\"-34.4659501\",\"y\":\"-58.5089068\"}', 3, 0),
(2, 'Instituto Superior de Formación Técnica 220', 'Virrey Loreto 2564', 'Actualmente, el ISFT Nº 220 brinda tres carreras técnicas del Nivel Superior gratuitas: Software, Alimentos, Higiene y Seguridad. Procuramos generar vínculos con establecimientos educativos de nivel secundario para que todos/as los jóvenes conozcan nuestra oferta formativa así como también vincularnos con el entorno socioproductivo. Poseemos un fuerte compromiso con la Educación Técnico Profesional.', 'Instituto', '0000', '{\"x\":\"-34.53948545659454\",\"y\":\"-58.5372086894925\"} ', 4, 0),
(3, 'Instituto Superior de Formación Docente 229', 'Virrey Loreto 2564', 'El Instituto Superior de Formación Docente n°229 es una institución educativa que se centra en la formación de docentes, siendo de gestión estatal, el mismo tiene como objetivo principal brindar una educación de calidad a sus estudiantes para que puedan desempeñarse de manera efectiva en su rol como docentes. Además de la formación académica, también tienen la responsabilidad de fomentar la investigación y la innovación en el campo de la educación, y de ofrecer programas de capacitación continua para los docentes que ya se encuentran en ejercicio.', 'Instituto', '0000', '{\"x\":\"-34.53956517424479\",\"y\":\"-58.53730879589805\"}', 4, 0),
(4, 'Instituto Superior de Formación Docente N° 39  \"Jean Piaget\"', 'Agustín Álvarez 1459, B1638', 'El Instituto Superior de Formación Docente N°39, cuenta hoy con una trayectoria de casi 50 años de vida institucional, social y cultural. Localizado en la ciudad de Vicente López, cuenta con una trayectoria como espacio formador mucho más amplia en toda la región. Las carreras que brinda la institución son las siguientes: Lengua y Literatura, Profesorado de Historia, Biología, Matemáticas, Inicial, Primaria y Educación Física, además de cursos,  capacitaciones, otras ofertas de formación permanente y postítulos.', 'Instituto', '1000', '{\"x\":\"-34.533209018367344\",\"y\":\"-58.47785332857143\"}', 4, 0),
(5, 'Escuela Normal Superior N° 117 \"Gral. José Gervasio Artigas\"', '3 de Febrero 1810, San Fernando', 'El instituto cuenta con una Planta Baja y dos pisos, en los cuales hay cincuenta aulas, un Gabinete de Física, un Gabinete de Química, un Gabinete de Biología, un Aula de Música, dos Bibliotecas, un microcine, un SUM, un amplio patio descubierto y dos salas de computación.', 'Instituto', '1000', '{\"x\":\"-34.4461581\",\"y\":\"-58.5510041\"}', 2, 0),
(6, 'Universidad Tecnológica Nacional de Pacheco', 'Av. Hipólito Yrigoyen 288', 'Ubicada en el corazón de la ciudad de General Pacheco, la FRGP es una Facultad pública e inclusiva, comprometida con la generación y promoción del conocimiento, la formación de profesionales de excelencia capaces de dar respuestas ante las demandas propias del desarrollo socioeconómico de nuestro país, teniendo como eje a la Innovación y el Desarrollo tecnológico al servicio de la comunidad, y específicamente de la Industria.', 'Universidad', '1110', '{\"x\":\"-34.456507093877555\",\"y\":\"-58.627104334693875\"}', 1, 0),
(7, 'Instituto Superior de Formación Docente y Técnica Nº 52 \"Maestro Francisco Isauro Arancibia\"', 'Rivadavia 349', 'El Instituto Superior de Formación Docente Instituto Superior De Formación Docente y Técnica N° 52 : \"Maestro Francisco Isauro Arancibia\" tiene la responsabilidad de fomentar la investigación y la innovación en el campo de la educación, y de ofrecer programas de capacitación continua para los docentes que ya se encuentran en ejercicio. Este cumple con estas funciones de manera efectiva, ofreciendo una amplia variedad de programas de formación docente en áreas como educación inicial, educación primaria, educación secundaria y educación técnica. Además, este instituto cuenta con un cuerpo docente altamente capacitado y comprometido con la excelencia académica y la formación integral de sus estudiantes.', 'Instituto', '0000', '{\"x\":\"-34.47004125\",\"y\":\"-58.5129331789133\"}', 3, 0),
(8, 'Centro Universitario de Vicente López', 'Carlos Villate 4480', 'El CUV forma parte de la propuesta educativa local que hace hincapié en la capacitación constante de toda la comunidad educativa.\nActualmente contamos con una capacidad de 24 aulas para albergar más de 1000 estudiantes, contamos con un termo tanque solar y además con una sala de psicomotricidad brindando la posibilidad a l@s estudiantes de dejar a sus hij@s de entre 2 y 5 años al cuidado de un equipo interdisciplinario de profesionales y un Equipo de Orientación a Estudiantes. Por último, el Centro Universitario ofrece un auditorio con capacidad para 293 personas, una biblioteca, cafetería y espacio de esparcimiento.', 'Centro universitario', '1111', '{\"x\":\"-34.53179603061225\",\"y\":\"-58.520279326530606\"}', 4, 0),
(9, 'Conservatorio Juan José Castro', 'Av. Sta Fe 1740', 'El Conservatorio de Música \"Juan José Castro\" es una institución estatal de nivel terciario en Buenos Aires que ofrece formación integral en música, con carreras docentes y tecnicaturas de 4 años, además de formación básica previa sin necesidad de conocimientos previos. Se pueden estudiar instrumentos como arpa, bandoneón, clarinete, contrabajo, corno, fagot, flauta dulce, flauta traversa, guitarra clásica, piano, oboe, percusión sinfónica, trompeta, trombón, saxofón, violín, viola, violoncello y canto lírico a partir de los 14 años. La cursada es anual y por materia, con horarios en turnos mañana, tarde y noche. La enseñanza es gratuita, con una cooperadora anual voluntaria. Otorga títulos con validez nacional.', 'Instituto', '1000', '{\"x\":\"-34.4757712\",\"y\":\"-58.5112714\"}', 3, 0),
(10, 'Instituto Superior de Formación Técnica Nº 199', 'Maestra Celina Voena 1700', 'Instituto de nivel superior terciario dependiente de la DGCyE de la Provincia de Buenos Aires. Brinda las siguientes especialidades: Tecnicatura Superior en Administración de Recursos Humanos, Tecnicatura Superior en Higiene y Seguridad en el Trabajo, Tecnicatura Superior en Logística, Tecnicatura Superior en Turismo y Tecnicatura Superior en Hotelería', 'Instituto', '1000', '{\"x\":\"-34.4669171\",\"y\":\"-58.6438196\"}', 1, 0),
(11, 'Instituto Superior de Formación Docente y Técnica Nº77', 'Sargento Cabral 2772', 'Nuestro ideario institucional consiste en promover instancias de enseñanza y aprendizaje que favorezcan la formación de futuros profesionales capaces de comprender procesos sociales, ideológicos, culturales, políticos y económicos, que les permitan desnaturalizar valores hegemónicos que justifiquen estereotipos y desigualdades sociales, comprometerse con la realidad y generar acciones para su transformación.', 'Instituto', '1000', '{\"x\":\"-34.524711\",\"y\":\"-58.51835514285714\"}', 4, 0),
(12, 'Polo de Educación Superior de Escobar', 'Sucre 1550', 'El PES tiene como objetivo la educación abarcativa y la atención a las demandas sociales de producción y empleo para facilitar el encuentro entre las necesidades del sector productivo y las respuestas que la investigación puede proveer.\nEn definitiva, se busca promover la interacción de diferentes sectores: los estudiantes, las instituciones educativas, el sector productivo, las agencias estatales, los centros de investigación y la promoción de la acción fundada en el conocimiento de construcción colectiva. Desde el Polo invitamos a todos a ser parte de este maravilloso desafío.\n', 'Polo educativo', '1101', '{\"x\":\"-34.37340855\",\"y\":\"-58.751130599999996\"}', 5, 0),
(13, 'Centro universitario de Tigre', 'Solis 1', 'Desde 2011, gestionamos el Centro Universitario Tigre (CUT) para mejorar la accesibilidad de los jóvenes a estudios terciarios y universitarios, permitiéndoles finalizar sus estudios cerca de sus hogares. El CUT ofrece el Ciclo Básico Común (CBC) para 86 carreras de la UBA y más de 10 carreras de diversas universidades. Además, brinda orientación vocacional gratuita y un Centro de Idiomas. Con 23 aulas, un salón de usos múltiples y tecnología avanzada, el CUT realiza anualmente la feria universitaria Expo CUT para orientar a los jóvenes sobre su formación profesional.', 'Centro universitario', '1111', '{\"x\":\"-34.4264888\",\"y\":\"-58.5664895\"}', 1, 0),
(14, 'Universidad Nacional del Delta', 'Av. Avellaneda 2270', 'La Universidad Nacional del Delta, creada en 2023, es una universidad nacional, pública y gratuita. Sirve como un punto de encuentro entre lo local y lo nacional, estudiantes y docentes, academia e industria, y entre pymes y grandes empresas, fomentando la colaboración y la innovación. Se destaca por su accesibilidad y compromiso con la inclusión, el diálogo abierto y la participación activa de la comunidad, fortaleciendo el tejido social y cultural de Tigre, San Fernando y Escobar. La Universidad Nacional del Delta es el lugar donde se construye un futuro de innovación y excelencia.', 'Universidad', '1110', '{\"x\":\"-34.4539417\",\"y\":\"-58.5582294\"}', 2, 0),
(15, 'Ciclo Básico Común Sede Martínez', 'Córdoba 2001 Martínez', 'En este centro universitario se pueden cursar todas las materias del ciclo básico común (CBC) y de las carreras de las facultades de Ciencias Económicas y Psicología. Cuenta con oficinas de departamento de alumnos, sala de profesores, biblioteca y el CURAI (Centro Universitario de Rehabilitaciones y Atención Integral), dicho centro de rehabilitación esta a cargo de la carrera terapia ocupacional. Tiene 40 aulas, dos aulas taller, dos laboratorios, tres estacionamientos y seguridad 24 horas. Cada carrera de la UBA y cada facultad tiene su propio régimen académico.', 'Centro universitario', '1011', '{\"x\":\"-34.498395\",\"y\":\"-58.524974\"}', 3, 0),
(16, 'Instituto Superior de Formación Docente y Técnica N° 140 \"Marie Curie\"', 'Av. Hipólito Yrigoyen 20, B1617 Gral. Pacheco', 'Redefinir el concepto de Instituto Superior de Formación Docente y Técnica solidario, promoviendo la participación democrática y el valor de la justicia, fomentando un fuerte compromiso de directivos, docentes, estudiantes y dirigentes, para que disfruten de su labor y sientan orgullo de pertenecer a la institución.\r\nReforzar el sentido de pertenencia a las carreras científicas y fortalecer los lazos con otras instituciones terciarias y universitarias que compartan nuestros valores, abogando por el apoyo de la comunidad.', 'Instituto', '0000', '{\"x\":\"-34.454911606325474\",\"y\":\"-58.62304406457402\"}', 1, 0),
(17, 'Instituto Superior de Formación Técnica Nº217', 'Av. del Libertador 1262', 'La búsqueda de construir el SER y el saber hacer se basa en el conocimiento y la experiencia adquiridos a través de la práctica real de competencias y capacidades profesionales, todo enmarcado en el Desarrollo Local. Esta visión integra la innovación productiva en bienes de servicio y capital, el desarrollo industrial de nuevas tecnologías, y la promoción de una Usina de Ideas, generadas a partir de las prácticas de los estudiantes, para sustentar el pilar fundamental de la investigación.', 'Instituto', '0000', '{\"x\":\"-34.44078146938776\",\"y\":\"-58.55377939795918\"}', 2, 0),
(19, 'Instituto Superior de Formación Docente y Técnica Nº 52 Sede en los Ceibos', 'Los Ceibos 52', 'El Instituto Superior de Formación Docente Instituto Superior De Formación Docente y Técnica N° 52 : \"Maestro Francisco Isauro Arancibia\" tiene la responsabilidad de fomentar la investigación y la innovación en el campo de la educación, y de ofrecer programas de capacitación continua para los docentes que ya se encuentran en ejercicio. Este cumple con estas funciones de manera efectiva, ofreciendo una amplia variedad de programas de formación docente en áreas como educación inicial, educación primaria, educación secundaria y educación técnica. Además, este instituto cuenta con un cuerpo docente altamente capacitado y comprometido con la excelencia académica y la formación integral de sus estudiantes. Consultar disponibilidad de carrera.', 'Instituto', '0000', '{\"x\":\"-34.51218044761526\",\"y\":\"-58.566873062618725\"}', 3, 0),
(20, 'Instituto Superior de Formación Docente y Técnica Nº 52 Sede Martin y Omar', 'Martin y Omar 255', 'El Instituto Superior de Formación Docente Instituto Superior De Formación Docente y Técnica N° 52 : \"Maestro Francisco Isauro Arancibia\" tiene la responsabilidad de fomentar la investigación y la innovación en el campo de la educación, y de ofrecer programas de capacitación continua para los docentes que ya se encuentran en ejercicio. Este cumple con estas funciones de manera efectiva, ofreciendo una amplia variedad de programas de formación docente en áreas como educación inicial, educación primaria, educación secundaria y educación técnica. Además, este instituto cuenta con un cuerpo docente altamente capacitado y comprometido con la excelencia académica y la formación integral de sus estudiantes.', 'Instituto', '0000', '{\"x\":\"-34.471184242472326\",\"y\":\"-58.51115989008575\"}', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `url` varchar(20) NOT NULL,
  `fk_establecimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `url`, `fk_establecimiento`) VALUES
(1, 'UNRSO.jpg', 1),
(2, 'ISFT220.jpg', 2),
(3, 'ISFD229.jpg', 3),
(4, 'I39.jpg', 4),
(5, 'I117.jpg', 5),
(6, 'UTNP.jpg', 6),
(7, '52sederivadavia.jpg', 7),
(8, 'CUV.webp', 8),
(9, 'CJJC.jpg', 9),
(10, 'I199.jpg', 10),
(11, 'ISFDT.jpg', 11),
(12, 'PESE.jpg', 12),
(13, 'cut1.jpg', 13),
(14, 'UND.jpg', 14),
(20, 'estudiantes.jpg', 0),
(21, 'gente.jpg', 0),
(22, 'graduados.jpg', 0),
(23, '140.jpg', 16),
(24, '52losceibos.jpg', 19),
(25, '52martinyomar.jpg', 20),
(26, 'cbcubasi.jpg', 15),
(27, 'ISFT_217.jpg', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id_recurso` int(11) NOT NULL,
  `pdf` varchar(100) DEFAULT NULL,
  `fk_carrera` int(11) DEFAULT NULL,
  `fk_establecimiento` int(11) NOT NULL,
  `tipo_recurso` enum('plan de estudio','diseño curricular','','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id_recurso`, `pdf`, `fk_carrera`, `fk_establecimiento`, `tipo_recurso`) VALUES
(1, 'educacionmusicalcjjc', 28, 9, 'plan de estudio'),
(2, 'cantocjjc', 25, 9, 'plan de estudio'),
(3, 'composicioncjjc', 27, 9, 'plan de estudio'),
(4, 'direccioncoralcjjc', 26, 9, 'plan de estudio'),
(5, 'instrumentocjjc', 24, 9, 'plan de estudio'),
(6, 'musicologiacjjc', 29, 9, 'plan de estudio'),
(19, 'ingcivilutn', 30, 6, 'plan de estudio'),
(20, 'ingenergiaelectricautn', 31, 6, 'plan de estudio'),
(21, 'ingautomotrizutn', 32, 6, 'plan de estudio'),
(22, 'ingmecanicautn', 33, 6, 'plan de estudio'),
(23, 'licorganizacionindustrialutn', 34, 6, 'plan de estudio'),
(24, 'tecsuperioradministracionutn', 35, 6, 'plan de estudio'),
(25, 'tecgestionindustriaautomotriz', 36, 6, 'plan de estudio'),
(26, 'tecmoldesmatricesdispositivosutn', 37, 6, 'plan de estudio'),
(27, 'tecprogramacionutn', 38, 6, 'plan de estudio'),
(28, 'licgestionambientalunso', 1, 1, 'plan de estudio'),
(29, 'tecciberseguridadunso', 2, 1, 'plan de estudio'),
(30, 'tecgestionambientalunso', 3, 1, 'plan de estudio'),
(31, 'tecdesarrollovideojuegosunso', 4, 1, 'plan de estudio'),
(33, 'tecsonidoaudiovisualunso', 6, 1, 'plan de estudio'),
(34, 'liccienciasforensesycriminologiaunso', 7, 1, 'plan de estudio'),
(35, 'liceconomiaunso', 8, 1, 'plan de estudio'),
(36, 'tecanalisiscontableunso', 9, 1, 'plan de estudio'),
(37, 'teccriminalisticaunso', 10, 1, 'plan de estudio'),
(38, 'licgestioneducativaunso', 11, 1, 'plan de estudio'),
(39, 'licgestionpublicaunso', 12, 1, 'plan de estudio'),
(40, 'licpsicopedagogiaunso', 13, 1, 'plan de estudio'),
(41, 'licpsicopedagogiacccunso', 14, 1, 'plan de estudio'),
(42, 'profeducacioninicialunso', 15, 1, 'plan de estudio'),
(43, 'tecgestionpublicaunso', 16, 1, 'plan de estudio'),
(44, 'enfermeriauniversitariaunso', 17, 1, 'plan de estudio'),
(45, 'licquirurgicaunso', 18, 1, 'plan de estudio'),
(46, 'tecemergenciasmedicasunso', 19, 1, 'plan de estudio'),
(47, 'tecsuperioralimentos220', 20, 2, 'plan de estudio'),
(48, 'tecseguridadhigiene220', 21, 2, 'plan de estudio'),
(49, 'tecdesarrollosoftware220', 22, 2, 'plan de estudio'),
(50, 'profsecundariatecprofesional229', 23, 3, 'plan de estudio'),
(51, 'mecatronica199', 39, 10, 'plan de estudio'),
(52, 'csdatosinteligenciaartificial199', 40, 10, 'plan de estudio'),
(55, 'prof_ingles77', 41, 11, 'plan de estudio'),
(56, 'tecnicaturatrabajosocial77', 42, 11, 'plan de estudio'),
(57, 'tecnicaturacomunicacionsocialdesarrollo77', 43, 11, 'plan de estudio'),
(59, '', 15, 4, 'plan de estudio'),
(60, '', 48, 4, 'plan de estudio'),
(61, '', 55, 4, 'plan de estudio'),
(62, '', 56, 4, 'plan de estudio'),
(63, '', 57, 4, 'plan de estudio'),
(64, '', 58, 4, 'plan de estudio'),
(65, 'proflengualiteratura', 59, 4, 'plan de estudio'),
(66, '', 15, 17, 'plan de estudio'),
(67, '', 48, 17, 'plan de estudio'),
(68, '', 53, 17, 'plan de estudio'),
(69, '', 54, 17, 'plan de estudio'),
(70, '', 21, 17, 'plan de estudio'),
(71, '', 49, 16, 'plan de estudio'),
(72, '', 20, 16, 'plan de estudio'),
(73, '', 50, 16, 'plan de estudio'),
(74, '', 51, 16, 'plan de estudio'),
(75, '', 52, 16, 'plan de estudio'),
(76, '', 48, 16, 'plan de estudio'),
(82, 'licenfermeriauba', 61, 12, 'plan de estudio'),
(83, 'liclogisticauntref', 62, 12, 'plan de estudio'),
(84, '', 63, 12, 'plan de estudio'),
(85, 'licseguridadhigieneunlz', 64, 12, 'plan de estudio'),
(86, 'licgestiongubernamentalunpaz', 65, 12, 'plan de estudio'),
(87, 'tecjardineriauba', 66, 12, 'plan de estudio'),
(88, '', 67, 12, 'plan de estudio'),
(89, 'tecuniprodvegetalorganicauba', 68, 12, 'plan de estudio'),
(90, 'tecunimantenimientoindustrialutnfrd', 69, 12, 'plan de estudio'),
(91, 'tecuniprocesosindustrialesutnfrd', 70, 12, 'plan de estudio'),
(92, 'tecuniprogramacionutnfrd', 38, 12, 'plan de estudio'),
(93, '', 71, 12, 'plan de estudio'),
(94, 'profeducacionespecialsordoshipoacusicos77', 44, 11, 'plan de estudio'),
(95, 'profeducacionespecialneuromotora77', 45, 11, 'plan de estudio'),
(96, 'profeducacionespecialintelectual77', 46, 11, 'plan de estudio'),
(97, 'profeducacionespecialciegosdisminucionvisual77', 47, 11, 'plan de estudio'),
(98, 'actuarioadmeconómicasuba', 73, 15, 'plan de estudio'),
(99, 'contadoreconómicasuba', 74, 15, 'plan de estudio'),
(100, 'administracióneconómicasuba', 75, 15, 'plan de estudio'),
(101, 'economíaeconómicasuba', 8, 15, 'plan de estudio'),
(102, 'sistemaseconómicasuba', 77, 15, 'plan de estudio'),
(103, 'actuarioecoeconómicasuba', 78, 15, 'plan de estudio'),
(104, 'licpsicologiauba', 79, 15, 'plan de estudio'),
(105, 'licmusicoterapiauba', 80, 15, 'plan de estudio'),
(106, 'licterapiaocupacionaluba', 81, 15, 'plan de estudio'),
(107, 'profenseñanzamediasuperiorpsicologiauba', 82, 15, 'plan de estudio'),
(108, 'licrelacionestrabajouba', 83, 15, 'plan de estudio'),
(119, 'Turismo199', 84, 10, 'diseño curricular'),
(120, 'HigieneSeguridad199', 21, 10, 'diseño curricular'),
(121, 'TecnicaturaSuperiorLogística199', 85, 10, 'diseño curricular'),
(122, 'tecsupenhoteleria199', 86, 10, 'diseño curricular'),
(123, 'trabajosocial199', 42, 10, 'diseño curricular'),
(124, 'tecsupenadminderecursoshumanos199', 87, 10, 'diseño curricular'),
(128, 'profedusecuntecprofindustrialprocesosalimentos117', 88, 5, 'diseño curricular'),
(129, 'ProfesoradoQuímica117', 54, 5, 'diseño curricular'),
(130, 'ProfesoradoHistoriaGeografía117', 53, 5, 'diseño curricular'),
(131, 'ProfesoradoEducaciónInicialprimaria117', 48, 5, 'diseño curricular'),
(133, 'proftecnico52', 89, 7, 'diseño curricular'),
(134, 'ProfesoradoEconomía52', 90, 7, 'diseño curricular'),
(135, 'ProfesoradoEducaciónInicialprimaria52', 48, 7, 'diseño curricular'),
(136, 'inglés52', 41, 7, 'diseño curricular'),
(144, 'Alimentos220', 20, 2, 'diseño curricular'),
(145, 'HigieneSeguridad220', 21, 2, 'diseño curricular'),
(146, 'DesarrolloSoftware220', 22, 2, 'diseño curricular'),
(147, 'ProfesoradoTécnicoSuperior229', 23, 3, 'diseño curricular'),
(148, 'proffinglés77', 41, 11, 'diseño curricular'),
(149, 'trabajosocial77', 42, 11, 'diseño curricular'),
(150, 'Comunicación_Social_para_el_Desarrollo77', 43, 11, 'diseño curricular'),
(151, 'NIVELESINICIALPRIMARIO39', 15, 4, 'diseño curricular'),
(152, 'NIVELESINICIALPRIMARIO39', 48, 4, 'diseño curricular'),
(153, 'ProfesoradoEducaciónFísica39', 55, 4, 'diseño curricular'),
(154, 'ProfesoradoBiología39', 56, 4, 'diseño curricular'),
(155, 'ProfesoradoHistoriaGeografía39', 57, 4, 'diseño curricular'),
(156, 'ProfesoradoMatemática39', 58, 4, 'diseño curricular'),
(157, 'ProfesoradoLenguaLiteratura39', 59, 4, 'diseño curricular'),
(158, 'HigieneSeguridad217', 21, 17, 'diseño curricular'),
(159, 'ProfesoradoBiología140', 49, 16, 'diseño curricular'),
(160, 'TSAlimentos140', 20, 16, 'diseño curricular'),
(161, 'ProfesoradoFísica140', 51, 16, 'diseño curricular'),
(162, 'ProfesoradoMatemática140', 52, 16, 'diseño curricular'),
(163, 'ProfesoradoEducaciónInicialprimaria140', 48, 16, 'diseño curricular'),
(164, 'PROFESORADOEDUCACIÓNESPECIAL77', 44, 11, 'diseño curricular'),
(165, 'PROFESORADOEDUCACIÓNESPECIAL77', 45, 11, 'diseño curricular'),
(166, 'PROFESORADOEDUCACIÓNESPECIAL77', 46, 11, 'diseño curricular'),
(167, 'PROFESORADOEDUCACIÓNESPECIAL77', 47, 11, 'diseño curricular'),
(172, 'diplomaturaeducontextosvulnerabilidaddelta', 106, 14, 'plan de estudio'),
(173, 'diploestrategiasmarketingempresasturisticasdelta', 103, 14, 'plan de estudio'),
(174, 'diplomaturadesarrolloemprendedorempresarialdelta', 105, 14, 'plan de estudio'),
(175, 'diplomaturaincendiosforestalesdelta', 102, 14, 'plan de estudio'),
(176, 'diplomaturagestiondesarrolloterritorialdelta', 104, 14, 'plan de estudio'),
(177, 'diplomaturanegociosdigitalesinnovaciondelta', 108, 14, 'plan de estudio'),
(178, 'diplomaturaseguridadsocialdelta', 107, 14, 'plan de estudio'),
(179, 'diplomaturaredesinformaticacomunicaciondatosdelta', 109, 14, 'plan de estudio'),
(180, 'diplomaturagestionemprendimientosturisticosdelta', 101, 14, 'plan de estudio'),
(187, 'profinglescuv', 41, 8, 'plan de estudio'),
(188, 'tecunisistemasinformaticoscuv', 113, 8, 'plan de estudio'),
(189, 'carreraenfermeriauniversitariacuv', 114, 8, 'plan de estudio'),
(190, 'tecsuperiorcinetvvideocuv', 115, 8, 'plan de estudio'),
(191, 'tecsuperiorcomunicacionsocialdesarrollocuv', 116, 8, 'plan de estudio'),
(192, 'tecsuperiordiseñointeriorescuv', 117, 8, 'plan de estudio'),
(193, 'proftecnico52', 89, 19, 'diseño curricular'),
(194, 'ProfesoradoEconomía52', 90, 19, 'diseño curricular'),
(195, 'ProfesoradoEducaciónInicialprimaria52', 48, 19, 'diseño curricular'),
(196, 'inglés52', 41, 19, 'diseño curricular'),
(198, 'proftecnico52', 89, 20, 'diseño curricular'),
(199, 'ProfesoradoEconomía52', 90, 20, 'diseño curricular'),
(200, 'ProfesoradoEducaciónInicialprimaria52', 48, 20, 'diseño curricular'),
(201, 'inglés52', 41, 20, 'diseño curricular'),
(203, 'CarreradegestióndeagroalimentosUBA', 157, 15, 'plan de estudio'),
(204, 'planificaciónydiseñodelpaisajeUBA', 128, 15, 'plan de estudio'),
(205, 'TecnicaturauniversitariaenjardineríaUBA', 66, 15, 'plan de estudio'),
(206, 'TecnicaturauniversitariaenproducciónvegetalorgánicaUBA', 68, 15, 'plan de estudio'),
(207, 'ProfesoradodeenseñanzasecundariaysuperiorencienciasambientalesUBA', 120, 15, 'plan de estudio'),
(208, 'UBACarreradeconomíaadministraciónagrarias', 118, 15, 'plan de estudio'),
(209, 'LicenciaturaencienciasambientalesUBA', 119, 15, 'plan de estudio'),
(210, 'agroUBA.pdf', 303, 15, 'plan de estudio'),
(211, 'ingenieríaagrimensurauba.pdf', 363, 15, 'plan de estudio'),
(212, 'ingenieríaalimentosuba.pdf', 365, 15, 'plan de estudio'),
(213, 'ingenieríaciviluba.pdf', 30, 15, 'plan de estudio'),
(214, 'ingenieríaelectrónicauba.pdf', 366, 15, 'plan de estudio'),
(215, 'ingenieríaenergíaeléctricauba.pdf', 31, 15, 'plan de estudio'),
(216, 'ingenieríaindustrialuba.pdf', 364, 15, 'plan de estudio'),
(217, 'ingenieríainformáticauba.pdf', 367, 15, 'plan de estudio'),
(218, 'ingenieríamecánicauba.pdf', 33, 15, 'plan de estudio'),
(219, 'ingenieríanavalmecánicauba.pdf', 368, 15, 'plan de estudio'),
(220, 'ingenieríapetróleouba.pdf', 369, 15, 'plan de estudio'),
(221, 'ingenieríaquímicauba.pdf', 370, 15, 'plan de estudio'),
(222, 'licenciaturaanálisissistemasuba.pdf', 371, 15, 'plan de estudio'),
(223, 'licenciaturacienciascomunicaciónuba.pdf', 343, 15, 'plan de estudio'),
(224, 'CienciasAtmósfera-uba.pdf', 136, 15, 'plan de estudio'),
(225, 'Lic.Computación-uba.pdf', 132, 15, 'plan de estudio'),
(226, 'CienciasBiológicas-uba.pdf', 131, 15, 'plan de estudio'),
(227, 'GestiónIntegralBioterio-uba.pdf', 205, 15, 'plan de estudio'),
(228, 'ÓpticaContactología-uba.pdf', 353, 15, 'plan de estudio'),
(229, 'MedicinaNuclear-uba.pdf', 354, 15, 'plan de estudio'),
(230, 'Lic.CienciaTecnologíaAlimentos-uba.pdf', 147, 15, 'plan de estudio'),
(231, 'Bioquímica-uba.pdf', 351, 15, 'plan de estudio'),
(232, 'Farmacia-uba.pdf', 352, 15, 'plan de estudio'),
(233, 'Odontología-uba.pdf', 377, 15, 'plan de estudio'),
(234, 'arquitecturauba', 314, 15, 'plan de estudio'),
(235, 'diseñográficouba', 125, 15, 'plan de estudio'),
(236, 'diseñoimagensonidouba', 127, 15, 'plan de estudio'),
(237, 'diseñoindumentariauba', 129, 15, 'plan de estudio'),
(238, 'diseñoindustrialuba', 126, 15, 'plan de estudio'),
(239, 'diseñotextiluba', 130, 15, 'plan de estudio'),
(240, 'liccienciasdatosuba', 148, 15, 'plan de estudio'),
(241, 'liccienciasfísicasuba', 133, 15, 'plan de estudio'),
(242, 'liccienciasmatemáticasuba', 135, 15, 'plan de estudio'),
(243, 'liccienciasquímicasuba', 137, 15, 'plan de estudio'),
(244, 'liccienciatecnologíaalimentosuba', 147, 15, 'plan de estudio'),
(245, 'licpaleontologíaiuba', 139, 15, 'plan de estudio'),
(246, 'licenciaturacienciapolíticauba', 175, 15, 'plan de estudio'),
(247, 'licenciaturasociologíauba', 180, 15, 'plan de estudio'),
(248, 'licenciaturatrabajosocialuba', 171, 15, 'plan de estudio'),
(249, 'veterinariauba', 344, 15, 'plan de estudio'),
(250, 'abogacíauba', 347, 15, 'plan de estudio'),
(251, 'calígrafopúblicouba', 348, 15, 'plan de estudio'),
(252, 'traductoradopúblicouba', 349, 15, 'plan de estudio'),
(253, 'profenseñanzamediasuperiorcienciasjurídicasuba', 350, 15, 'plan de estudio'),
(254, 'bibliotecologíacienciainformaciónuba', 372, 15, 'plan de estudio'),
(255, 'cienciasantropológicasuba', 183, 15, 'plan de estudio'),
(256, 'ediciónuba', 373, 15, 'plan de estudio'),
(257, 'historiauba', 178, 15, 'plan de estudio'),
(258, 'liccienciaseducaciónuba', 374, 15, 'plan de estudio'),
(259, 'licenciaturaartesuba', 375, 15, 'plan de estudio'),
(260, 'licenciaturafilosofíauba', 179, 15, 'plan de estudio'),
(261, 'licenciaturageografíauba', 193, 15, 'plan de estudio'),
(262, 'licenciaturaletrasuba', 376, 15, 'plan de estudio'),
(263, 'licenfermeriauba', 61, 15, 'plan de estudio'),
(264, 'licfonoaudiologíauba', 378, 15, 'plan de estudio'),
(265, 'lickinesiologíafisiatríauba', 165, 15, 'plan de estudio'),
(266, 'licnutriciónuba', 381, 15, 'plan de estudio'),
(267, 'licobstetriciauba', 382, 15, 'plan de estudio'),
(268, 'licproducciónbioimágenesuba', 386, 15, 'plan de estudio'),
(269, 'medicinauba', 380, 15, 'plan de estudio'),
(270, 'tecuniversitariaanestesiauba', 396, 15, 'plan de estudio'),
(271, 'tecuniversitariahemoterapiainmunohematologíauba', 387, 15, 'plan de estudio'),
(272, 'tecuniversitariainstrumentaciónquirúrgicauba', 390, 15, 'plan de estudio'),
(273, 'tecuniversitariapodologíauba', 384, 15, 'plan de estudio'),
(274, 'tecuniversitariaprácticascardiológicasuba', 391, 15, 'plan de estudio'),
(275, 'tecuniversitariaradiologíauba', 163, 15, 'plan de estudio'),
(276, 'profenseñanzaasecundariasuperiorcienciaseducaciónuba', 397, 15, 'plan de estudio'),
(277, 'profenseñanzamediasuperiorcienciasantropológicasuba', 398, 15, 'plan de estudio'),
(278, 'profenseñanzamediasuperiorfilosofíauba', 392, 15, 'plan de estudio'),
(279, 'profenseñanzamediasuperiorhistoriauba', 399, 15, 'plan de estudio'),
(280, 'profenseñanzasecundariasuperiorgeografíauba', 395, 15, 'plan de estudio'),
(281, 'profenseñanzasecundariasuperiorletrasuba', 400, 15, 'plan de estudio'),
(282, 'profesoradoenseñanzasecundariasuperiorartesuba', 401, 15, 'plan de estudio'),
(283, 'profenseñanzamediasuperiorcienciapolíticauba', 403, 15, 'plan de estudio'),
(284, 'profesoradoenseñanzamediasuperiorcienciascomunicaciónuba', 402, 15, 'plan de estudio'),
(285, 'profesoradoenseñanzamediasuperiortrabajosocialuba', 406, 15, 'plan de estudio'),
(286, '', 159, 15, 'plan de estudio'),
(287, '', 121, 15, 'plan de estudio'),
(288, '', 312, 15, 'plan de estudio'),
(289, '', 138, 15, 'plan de estudio'),
(290, '', 334, 15, 'plan de estudio'),
(291, '', 330, 15, 'plan de estudio'),
(292, '', 331, 15, 'plan de estudio'),
(293, '', 143, 15, 'plan de estudio'),
(294, '', 134, 15, 'plan de estudio'),
(295, '', 145, 15, 'plan de estudio'),
(296, '', 146, 15, 'plan de estudio'),
(297, '', 403, 15, 'plan de estudio'),
(298, '', 404, 15, 'plan de estudio'),
(299, '', 405, 15, 'plan de estudio'),
(300, '', 351, 8, 'plan de estudio'),
(301, '', 354, 8, 'plan de estudio'),
(302, '', 353, 8, 'plan de estudio'),
(303, '', 352, 8, 'plan de estudio'),
(304, '', 378, 8, 'plan de estudio'),
(305, '', 386, 8, 'plan de estudio'),
(306, '', 165, 8, 'plan de estudio'),
(307, '', 17, 8, 'plan de estudio'),
(308, '', 380, 8, 'plan de estudio'),
(309, '', 381, 8, 'plan de estudio'),
(310, '', 382, 8, 'plan de estudio'),
(311, '', 163, 8, 'plan de estudio'),
(312, '', 384, 8, 'plan de estudio'),
(313, '', 387, 8, 'plan de estudio'),
(314, '', 389, 8, 'plan de estudio'),
(315, '', 390, 8, 'plan de estudio'),
(316, '', 391, 8, 'plan de estudio'),
(317, '', 396, 8, 'plan de estudio'),
(318, '', 68, 8, 'plan de estudio'),
(319, '', 66, 8, 'plan de estudio'),
(320, '', 67, 8, 'plan de estudio'),
(321, '', 121, 8, 'plan de estudio'),
(322, '', 377, 8, 'plan de estudio'),
(323, '', 344, 8, 'plan de estudio'),
(324, '', 345, 8, 'plan de estudio'),
(325, '', 157, 8, 'plan de estudio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(6) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `contrasena`) VALUES
(5, 'prueba', 'prueba', 'prueba@gmail.com', '$2y$10$0JH78446yZlEOvN0aUrwt.1TdQdcOQXkK85ykRXTP9GtR1yabrfHO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `fk_establecimiento` (`fk_establecimiento`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id_distrito`);

--
-- Indices de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD PRIMARY KEY (`id_establecimiento`),
  ADD KEY `fk_distrito` (`fk_distrito`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `fk_establecimiento_2` (`fk_establecimiento`),
  ADD KEY `fk_establecimiento` (`fk_establecimiento`) USING BTREE;

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recurso`),
  ADD KEY `fk_establecimiento` (`fk_establecimiento`),
  ADD KEY `fk_carrera` (`fk_carrera`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=407;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  MODIFY `id_establecimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_establecimiento` FOREIGN KEY (`fk_establecimiento`) REFERENCES `establecimiento` (`id_establecimiento`) ON DELETE CASCADE;

--
-- Filtros para la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD CONSTRAINT `fk_distrito` FOREIGN KEY (`fk_distrito`) REFERENCES `distrito` (`id_distrito`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_establecimiento3` FOREIGN KEY (`fk_establecimiento`) REFERENCES `establecimiento` (`id_establecimiento`) ON DELETE CASCADE;

--
-- Filtros para la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `fk_carrera` FOREIGN KEY (`fk_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_establecimiento2` FOREIGN KEY (`fk_establecimiento`) REFERENCES `establecimiento` (`id_establecimiento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
