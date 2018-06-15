-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2018 a las 02:29:56
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(10) NOT NULL,
  `idPelicula` int(100) NOT NULL,
  `idUsuario` int(100) NOT NULL,
  `texto` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `idPelicula`, `idUsuario`, `texto`) VALUES
(234, 85, 7, '\nPrecisidad de pelicula francesa a mi me encanto amelie como personaje. ojalá existiera'),
(235, 84, 7, '\ngran pelicula de mi epoca ochentera me encanta jejejeje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(100) NOT NULL,
  `genero` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `genero`) VALUES
(4, 'accion    '),
(5, 'comedia'),
(6, 'terror '),
(7, 'animacion   '),
(8, 'ciencia ficción'),
(9, 'documental   ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `idPelicula` int(100) NOT NULL,
  `tituloPelicula` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaPelicula` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Director` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sinopsis` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idGenero` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`idPelicula`, `tituloPelicula`, `fechaPelicula`, `Director`, `sinopsis`, `foto`, `idGenero`) VALUES
(84, 'rambo', '06/07/1985', 'George Pan Cosmatos', 'Rambo es excarcelado y enviado de vuelta al Vietnam con una nueva misión: averiguar el paradero de unos soldados norteamericanos desaparecidos. Tras saltar en paracaídas en la jungla, portando únicamente un cuchillo y un arco con flechas, se le dice que no ataque al enemigo y que sólo haga fotografías de reconocimiento. Pero el plan no saldrá como estaba previsto... (FILMAFFINITY)\r\n', 'ilJwEym2.jpg', 4),
(85, 'amelie', '02/07/2001', 'Jean-Pierre Jeunet', 'Amelie no es una chica como las demás. Ha visto a su pez de colores deslizarse hacia las alcantarillas municipales, a su madre morir en la plaza de Nôtre-Dame y a su padre dedicar todo su afecto a un gnomo de jardín. De repente, a los veintidós años, descubre su objetivo en la vida: arreglar la vida de los demás. A partir de entonces, inventa toda clase de estrategias para intervenir en los asuntos de los demás: su portera, que se pasa los días bebiendo vino de Oporto; Georgette, una estanquera hipocondríaca, o \"el hombre de cristal\", un vecino que sólo ve el mundo a través de la reproducción de un cuadro de Renoir. (FILMAFFINITY)\r\n', 'iHtZMcgA.jpg', 5),
(86, 'Star Wars', '06/21/1977', 'george lucas', 'La princesa Leia, líder del movimiento rebelde que desea reinstaurar la República en la galaxia en los tiempos ominosos del Imperio, es capturada por las Fuerzas Imperiales, capitaneadas por el implacable Darth Vader, el sirviente más fiel del Emperador. El intrépido y joven Luke Skywalker, ayudado por Han Solo, capitán de la nave espacial \"El Halcón Milenario\", y los androides, R2D2 y C3PO, serán los encargados de luchar contra el enemigo e intentar rescatar a la princesa para volver a instaurar la justicia en el seno de la galaxia. (FILMAFFINITY)\r\n', 'iOH3AtrI.jpg', 8),
(87, 'rescate en nueva york', '01/07/1981', 'John Carpenter', 'Año 1997. El avión del presidente de los Estados Unidos es secuestrado por un grupo radical, pero consigue sobrevivir y se encuentra solo en las calles de Nueva York, donde Manhattan se ha convertido en una enorme prisión de alta seguridad. Ante la imposibilidad de lanzar una acción convencional, por miedo a que maten al presidente, se decide enviar a un agente secreto para rescatarlo. El elegido es \"Serpiente\" Plissken (Kurt Russell), un conocido convicto al que todos daban por muerto. (FILMAFFINITY)\r\n', 'ij4NIQAh.jpg', 4),
(88, 'melancholia', '06/14/2011', 'Lars von Trier', 'Justine (Kirsten Dunst) y su prometido Michael (Alexander Skarsgård) celebran su boda con una suntuosa fiesta en casa de su hermana (Charlotte Gainsbourg) y su cuñado (Kiefer Sutherland). Mientras tanto, el planeta Melancolía se dirige hacia la Tierra... (FILMAFFINITY)\r\n', 'iOc3p3Hf.jpg', 8),
(89, 'anticristo', '06/17/2009', 'lars von trier', 'Un psicólogo, que quiere ayudar a su mujer a superar la muerte de su hijo en un accidente, decide llevarla a una cabaña perdida en medio de un bosque, donde ella había pasado el último verano con el niño. Sin embargo, la terapia no funciona, y tanto ella como la naturaleza empiezan a comportarse de un modo extraño. (FILMAFFINITY)\r\n', 'irX4B7Lb.jpg', 6),
(90, 'los bingueros', '06/14/1979', 'Mariano Ozores', 'Amadeo es un mediocre empleado de banca que nunca alcanzará ese tranquilo nivel económico con el que todo el mundo sueña. Tampoco Fermín tiene muy seguro su futuro. Cobra el paro y hace chapuzas vendiendo libros y haciendo contratos de entierros pagados a plazos. Por distintas razones llegan a la conclusión de que el bingo puede llegar a ser la solución de sus males, y ambos personajes se conocen en la cola de entradas a un local del bingo. Aúnan sus esfuerzos pero ni siquiera así logran sacar dinero al juego. Pero ya están atrapados por el vicio. Y siguen jugando aunque para ello tengan que recurrir a todo tipo de trucos para lograr el dinero necesario... (FILMAFFINITY)\r\n', 'isNVtwx5.jpg', 5),
(91, 'terminator', '05/09/1984', 'James Cameron', 'Los Ángeles, año 2029. Las máquinas dominan el mundo. Los rebeldes que luchan contra ellas tienen como líder a John Connor, un hombre que nació en los años ochenta. Para acabar con la rebelión, las máquinas deciden enviar al pasado a un robot -Terminator- cuya misión será eliminar a Sarah Connor, la madre de John, e impedir así su nacimiento. (FILMAFFINITY)\r\n', 'iZVF3x2.jpg', 8),
(92, 'Million Dollar Baby', '02/11/2004', 'Clint Eastwood', 'Después de haber entrenado y representado a los mejores púgiles, Frankie Dunn (Eastwood) regenta un gimnasio con la ayuda de Scrap (Freeman), un ex-boxeador que es además su único amigo. Frankie es un hombre solitario y adusto que se refugia desde hace años en la religión buscando una redención que no llega. Un día, entra en su gimnasio Maggie Fitzgerald (Hilary Swank), una voluntariosa chica que quiere boxear y que está dispuesta a luchar denodadamente para conseguirlo. Pero lo que más desea y necesita es que alguien crea en ella. Frankie la rechaza alegando que él no entrena chicas y que, además, es demasiado mayor. Pero Maggie no se rinde y se machaca cada día en el gimnasio, con el único apoyo de Scrap. Finalmente, convencido de la inquebrantable determinación de Maggie, Frankie decide entrenarla. (FILMAFFINITY)\r\n', 'i3PF5fBq.jpg', 4),
(93, 'smoke', '06/14/1995', 'Wayne Wang', 'Brooklyn, verano de 1987. Algunas personas que frecuentan el estanco de Auggie Wren (Harvey Keitel) le confían sus problemas. La rocambolesca historia de cómo consiguió su cámara fotográfica y de por qué se decidió a elaborar su singular colección de fotografías le dará por fin un argumento a Paul Benjamin (William Hurt), un prestigioso novelista que atravies una crisis. Por su parte, Paul ayudará a Rashid (Harold Perrineaud Jr.), un adolescente negro bastante desorientado que busca a su padre (Whitaker). (FILMAFFINITY)\r\n', 'ionDctNr.jpg', 4),
(94, 'el corazon del angel', '06/14/2018', 'Alan Parker', 'A Harry Angel (Mickey Rourke), un detective privado que está pasando una mala racha, lo contrata en Nueva York un misterioso personaje (Robert de Niro) para que encuentre a un hombre desaparecido. Cuando conoce a Epiphany Proudfoot (Lisa Bonet), hija de un sacerdote vudú, se suceden extrañas muertes, que parecen estar relacionadas con la magia negra y que implican a Harry de una manera cada vez más personal. (FILMAFFINITY)\r\n', 'iJ64odOu.jpg', 4),
(95, 'el luchador', '06/02/2008', 'Darren Aronofsky', 'Randy \"The Ram\" Robinson (Mickey Rourke) es un luchador profesional de wrestling que, tras haber sido una estrella en la década de los ochenta, trata de continuar su carrera en el circuito independiente, combatiendo en cuadriláteros de tercera categoría. Cuando se da cuenta de que los brutales golpes que ha recibido a lo largo de su carrera le empiezan a pasar factura, decide poner un poco de orden en su vida: intenta acercarse a Stephanie, la hija que abandonó (Evan Rachel Wood) y trata de superar la soledad con su amor por Cassidy, una streaper (Marisa Tomei). (FILMAFFINITY)\r\n\r\n', 'i5NxBmg3.jpg', 4),
(96, 'cumbres borrascosas', '06/10/1992', 'William Wyler', 'Perdido en medio de una tormenta de nieve en un rocoso páramo inglés, un extranjero se topa con Cumbres Borrascosas, la lúgubre mansión del misterioso Heathcliff, un hombre tan torturado por un amor frustrado que ha perdido el deseo de vivir. Mientras la tormenta ruge en el exterior, el fatigado caminante escucha fascinado la triste historia del desesperado amor de Heathcliff y Cathy. Cuando Heathcliff volvió a buscarla, después de una larga ausencia intentando hacer fortuna, Cathy ya se había casado con un joven de la alta sociedad. El desengaño destrozó el alma de Heathcliff, pero no logró apagar el fuego de una pasión inextinguible que arderá en sus entrañas por toda la eternidad. (FILMAFFINITY)\r\n', 'iQdIGkbG.jpg', 4),
(97, 'mar adentro', '06/09/2004', 'amenabar', 'Ramón (Javier Bardem) lleva casi treinta años postrado en una cama al cuidado de su familia. Su única ventana al mundo es la de su habitación, que da al mar, donde sufrió el accidente que interrumpió su juventud. Desde entonces, su único deseo es morir dignamente. En su vida ejercen una gran influencia dos mujeres: Julia (Belén Rueda), una abogada que apoya su causa, y Rosa (Lola Dueñas), una vecina que intenta convencerlo de que vivir merece la pena. Pero también ellas, cautivadas por la luminosa personalidad de Ramón, se replantearán los principios que rigen sus vidas. Él sabe que sólo quien de verdad le ame le ayudará a emprender el último viaje. (FILMAFFINITY)\r\n', 'iBl3es1r.jpg', 4),
(98, 'todo sobre mi madre', '06/16/1999', 'almodovar', 'Madrid. Manuela, una madre soltera, ve morir a su hijo el día en que cumple 17 años, por echarse a correr para conseguir el autógrafo de Huma Rojo, su actriz favorita. Destrozada, Manuela viaja entonces a Barcelona en busca del padre del chico. (FILMAFFINITY)\r\n', 'iyCgrcwl.jpg', 5),
(99, 'tesis', '06/05/1996', 'amenabar', 'Ángela, estudiante de Imagen, está preparando una tesis sobre la violencia audiovisual. Como complemento a su trabajo, su director de tesis se compromete a buscar en la videoteca de la facultad material para ella, pero al día siguiente es hallado muerto. Ángela conoce a Chema, un compañero experto en cine gore y pornográfico, y a Bosco, un extraño chico, amigo íntimo de una joven asesinada en una snuff movie. (FILMAFFINITY)\r\n', 'iCg1Fc5f.jpg', 4),
(100, 'solas', '06/09/1999', 'benito zambrano', 'María (Ana Fernández) malvive en un oscuro apartamento de un barrio miserable, trabaja eventualmente como chica de la limpieza y, casi con cuarenta años, descubre que está embarazada de un hombre que no la ama. Su soledad es tan grande que sólo encuentra consuelo en la bebida. Su madre (María Galiana), que ha consumido su vida al lado de un hombre violento e intolerante, no tiene ni siquiera el consuelo de tenerla cerca. Con motivo del ingreso de su marido en un hospital, la madre visita a María en su apartamento y conoce a un vecino viudo (Carlos Álvarez) que vive con su perro. La relación que se establece entre estos tres náufragos alivia sus soledades y deja una puerta abierta a la esperanza. (FILMAFFINITY)\r\n', 'ipiwdLdQ.jpg', 5),
(101, 'el desencanto', '06/15/1977', 'jaime chavarri', 'Leopoldo Panero, poeta, murió en Astorga, donde había nacido, en el año 1962. Catorce años más tarde, las personas que más íntimamente estuvieron ligadas a él, Felicidad Blanc, su viuda, y sus tres hijos, recuerdan aquel caluroso día de agosto. El recuerdo queda sometido a algo más que aquella fecha. Surgen otras vivencias. Y a través de la palabra y del recorrido por habitaciones, objetos, calles y lugares perdidos, se desvela la historia de unos años y de unas personas unidas por vínculos familiares que en ningún momento huyen de la expresión de sus diferencias y de sus identidades. (FILMAFFINITY)\r\n', 'ijt7r5h.jpg', 5),
(102, 'los santos inocentes', '01/11/1984', 'mario camus', 'España franquista. Durante la década de los sesenta, una familia de campesinos vive miserablemente en un cortijo extremeño bajo la férula del terrateniente. Su vida es renuncia, sacrificio y y obediencia. Su destino está marcado, a no ser que algún acontecimiento imprevisto les permita romper sus cadenas. Adaptación de la novela homónima de Miguel Delibes. (FILMAFFINITY)\r\n', 'ii6bdYo7.jpg', 5),
(103, 'informe pelicano', '06/16/1993', 'Alan J. Pakula', 'Darby Shaw (Julia Roberts), una estudiante de Derecho, escribe un informe en el que analiza las posibles razones del reciente asesinato de dos jueces del Tribunal Supremo. Su informe, en principio descabellado, parece que toca material \"sensible\", pues pronto será objeto de una implacable persecución, de la que saldrá con vida gracias a la ayuda de un periodista (Denzel Washington) que también quiere descubrir quiénes están detrás de esos asesinatos. (FILMAFFINITY)\r\n', 'iJ1MYgpb.jpg', 4),
(105, 'la roca', '06/12/1996', 'Michael Bay', '\r\nFrancis Hummel pretende que se indemnice a las familias de los soldados muertos en misiones secretas. Tras robar 16 misiles equipados con gas venenoso, toma Alcatraz y amenaza con lanzarlos sobre San Francisco. Para resolver la situación, el F.B.I. envía a la isla a un especialista en armamento biológico y al único fugado de la famosa prisión. (FILMAFFINITY)', 'ifAVzsyr.jpg', 4),
(107, 'rocky', '06/03/1976', 'John G. Avildsen', 'Rocky Balboa es un desconocido boxeador a quien se le ofrece la posibilidad de pelear por el título mundial de los pesos pesados. Con una gran fuerza de voluntad, Rocky se prepara concienzudamente para el combate y también para los cambios que acabarán produciéndose en su vida. (FILMAFFINITY)\r\n', 'iWB6ihgd.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(100) NOT NULL,
  `nick` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nick`, `email`, `contrasena`, `nivel`) VALUES
(7, 'admin', 'admin@gmail.com', '654321', b'1'),
(8, 'pedro', 'pedro@gmail.com', '123456', b'0'),
(9, 'luis', 'luis@gmail.com', '123456', b'0'),
(31, 'luis jose', 'luisjose@gmail.com', '123456', b'0'),
(32, 'perez', 'perez@gmail.com', '123456', b'0'),
(33, 'fernando', 'perez12@gmail.com', '123456', b'0'),
(34, 'rtrtrt', 'luis@grmail.com', '123456', b'0'),
(35, 'pepito pepito', 'luis23@gmail.com', '123456', b'0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idPelicula` (`idPelicula`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`idPelicula`),
  ADD KEY `idGenero` (`idGenero`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idPelicula` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`idPelicula`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
