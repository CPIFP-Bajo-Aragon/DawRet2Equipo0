-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 192.168.4.236:3306:3306
-- Tiempo de generación: 13-03-2023 a las 13:34:25
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sarabastall`
--

drop schema if exists sarabastall;
create schema sarabastall;
use sarabastall;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono`
--

CREATE TABLE `abono` (
  `idAbono` int NOT NULL,
  `fechaAbonado` date NOT NULL,
  `cantidad` double NOT NULL,
  `idPrestamo` int NOT NULL,
  `idMovimiento` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idAlumno` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `idGenero` int NOT NULL,
  `anyo_nacimiento` int NOT NULL,
  `padre` varchar(100) NOT NULL,
  `direccion_familiar` varchar(100) DEFAULT NULL,
  `foto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlumno`, `nombre`, `idGenero`, `anyo_nacimiento`, `padre`, `direccion_familiar`, `foto`) VALUES
(1, 'ftfhg', 1, 2312, 'hjkh', '', '1678448413.png'),
(44, 'Mario', 1, 1999, 'papa de mario', 'alcañiz', ''),
(45, 'Mario', 1, 1999, 'papa de mario', 'huse', '1678194052.'),
(46, 'asd', 1, 1231, 'asdewfrw', 'dsfew', '1678194055.'),
(49, 'Carlos', 1, 2000, 'TOmas', 'asda', '1677676449.png'),
(50, 'asd', 1, 1232, 'asd', 'asd', '1677676646.jpg'),
(78, 'azxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 1, 2133, 'adssddsas', '', ''),
(79, 'sdsad', 1, 1231, 'adasd', 'dfdd', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beca`
--

CREATE TABLE `beca` (
  `idBeca` int NOT NULL,
  `importe` double NOT NULL,
  `Obs` varchar(100) DEFAULT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `idTipo` int DEFAULT NULL,
  `idCentro` int DEFAULT NULL,
  `idPersona` int DEFAULT NULL,
  `fechaAbonoMadrina` date DEFAULT NULL,
  `idAlumno` int DEFAULT NULL,
  `fechaAlumno` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `beca`
--

INSERT INTO `beca` (`idBeca`, `importe`, `Obs`, `fechaInicio`, `fechaFin`, `idTipo`, `idCentro`, `idPersona`, `fechaAbonoMadrina`, `idAlumno`, `fechaAlumno`) VALUES
(1, 6786, 'cositras', '2023-02-01', '2023-02-01', 1, 1, 13, '2023-02-01', 1, '2023-02-01'),
(10, 900, 'hola', '2023-03-01', '2023-03-30', 2, 1, 13, '2023-03-02', 1, '2023-03-02'),
(11, 8700, 'adios', '2023-03-02', '2023-03-30', 1, 1, 13, '2023-03-01', 1, '2023-03-08'),
(12, 234243, 'sadasd', '2023-03-16', '2023-03-18', 1, 1, 13, '2023-03-15', 1, '2023-03-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE `centro` (
  `idCentro` int NOT NULL,
  `nombreCentro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `distancia` int NOT NULL,
  `idCiudad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `centro`
--

INSERT INTO `centro` (`idCentro`, `nombreCentro`, `distancia`, `idCiudad`) VALUES
(1, 'sadsa', 234, 1),
(3, 'mi casa', 123, 1),
(4, 'sdasda', 2, 4),
(5, 'asdads', 123, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idCiudad` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cuantia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `nombre`, `cuantia`) VALUES
(1, 'Alcañiz', 2),
(3, 'micasa', 21),
(4, 'ssada', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idCurso` int NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `nombreCurso` varchar(50) NOT NULL,
  `idEspecialidad` int DEFAULT NULL,
  `idPersona` int DEFAULT NULL,
  `fechaImpartir` date DEFAULT NULL,
  `importe` int NOT NULL,
  `movimiento_idMovimiento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idCurso`, `fechaInicio`, `fechaFin`, `nombreCurso`, `idEspecialidad`, `idPersona`, `fechaImpartir`, `importe`, `movimiento_idMovimiento`) VALUES
(9, '2023-09-18', '2023-06-23', 'gjhj', 1, 20, NULL, 20, 5),
(10, '2022-09-19', '2023-06-22', '56', 1, 20, NULL, 450, 5),
(11, '2023-03-12', '2023-03-14', 'tercero primaria', 1, 20, NULL, 2, 5),
(12, '2023-03-15', '2023-03-18', 'secundino', 1, 20, NULL, 123, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_material`
--

CREATE TABLE `curso_material` (
  `idMaterial` int NOT NULL,
  `idCurso` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `curso_material`
--

INSERT INTO `curso_material` (`idMaterial`, `idCurso`) VALUES
(16, 9),
(17, 9),
(18, 9),
(19, 9),
(20, 9),
(22, 9),
(23, 11),
(24, 11),
(25, 11),
(26, 11),
(21, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_persona`
--

CREATE TABLE `curso_persona` (
  `idCurso` int NOT NULL,
  `idTrabajador` int NOT NULL,
  `notaFinal` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `curso_persona`
--

INSERT INTO `curso_persona` (`idCurso`, `idTrabajador`, `notaFinal`) VALUES
(9, 42, 8),
(9, 48, 5),
(9, 52, 7),
(9, 53, 8),
(10, 58, 7),
(11, 74, 7),
(11, 77, 5),
(12, 76, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idEspecialidad` int NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idEspecialidad`, `nombre`) VALUES
(1, 'maestro'),
(2, 'sanitario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad_persona`
--

CREATE TABLE `especialidad_persona` (
  `idEspecialidad` int NOT NULL,
  `idTrabajador` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `especialidad_persona`
--

INSERT INTO `especialidad_persona` (`idEspecialidad`, `idTrabajador`) VALUES
(1, 20),
(2, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int NOT NULL,
  `estado` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `estado`) VALUES
(1, 'Nueva'),
(2, 'Pagando'),
(3, 'Pagado'),
(4, 'Atrasado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `idMaterial` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `archivo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`idMaterial`, `nombre`, `archivo`) VALUES
(2, 'asdf', 0x656a342e385f6d6572696e6f5f6f736361722e68746d6c),
(4, 'jordas', 0x75736162696c696461642e68746d6c),
(5, 'asanfd', 0x4172726179),
(7, '', 0x61646d696e697374726163696f6e2e706e67),
(8, 'aosdhjioasfhg', 0x436170747572612064652070616e74616c6c6120646520323032322d31302d31392031302d35392d35322e706e67),
(9, 'pedrito', 0x6c6f676f2e6a7067),
(10, 'midgard', 0x4d6964676172642e636f6e66),
(16, 'retos', 0x7265746f732e68746d6c),
(17, 'retos_sup', 0x7265746772617375702e68746d6c),
(18, 'profesores_med', 0x70726f6772616d65642e68746d6c),
(19, 'retos_med', 0x7265746772616d65642e68746d6c),
(20, 'profesores_sup', 0x70726f666772617375702e68746d6c),
(21, 'pasras', 0x6c6f676f2e6a7067),
(22, 'capt', 0x436170747572612064652070616e74616c6c6120646520323032322d31302d31392031302d35392d35322e706e67),
(23, '', 0x74617265615048502e706e67),
(24, 'pag', 0x706167696e6163696f6e5f6f7264656e6163696f6e2e706e67),
(25, 'cptiares', 0x436170747572612064652070616e74616c6c6120646520323032322d31302d31392031302d35392d33392e706e67),
(26, 'listado', 0x6c69737461646f2e706e67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `idMovimiento` int NOT NULL,
  `procedencia` varchar(50) NOT NULL,
  `accion` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` double NOT NULL,
  `idTipo` int DEFAULT NULL,
  `idBeca` int DEFAULT NULL,
  `idPrestamo` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`idMovimiento`, `procedencia`, `accion`, `fecha`, `cantidad`, `idTipo`, `idBeca`, `idPrestamo`) VALUES
(5, 'microcredito', 'Inicia', '2023-03-08', 987654321, 1, NULL, 21),
(10, 'microcredito', 'jaja', '2023-03-09', 12, 1, NULL, 6),
(17, 'microcredito', 'asasf', '2023-03-10', 23, 1, NULL, 21),
(18, 'microcredito', 'que tal', '2023-03-10', 12, 1, NULL, 12),
(20, 'beca', '234', '2023-03-10', 234, 1, 1, NULL),
(21, 'beca', 'buenas', '2023-03-10', 123, 1, 1, NULL),
(22, 'beca', 'que tal', '2023-03-10', 123, 1, 11, NULL),
(23, 'beca', 'primer pago', '2023-03-10', 12, 1, 10, NULL),
(25, 'microcredito', 'Inicia', '2023-03-13', 123123, 1, NULL, 23),
(26, 'microcredito', 'Inicia', '2023-03-13', 123123, 1, NULL, 24),
(27, 'microcredito', 'Inicia', '2023-03-13', 777, 1, NULL, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `clave` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `activo` tinyint NOT NULL,
  `DNI` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `cursoActual` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idRol` int DEFAULT NULL,
  `idTipo` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `username`, `clave`, `activo`, `DNI`, `nombre`, `apellidos`, `telefono`, `correo`, `fechaNacimiento`, `cursoActual`, `idRol`, `idTipo`) VALUES
(1, 'jordi', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 1, '18468035R', 'Paco', 'Monfort Nietooss', '654425971', 'new@gmail.com', '2022-12-26', '9', 100, 1),
(13, 'paella', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '05988561M', 'Paella', 'Marisco', 'Marisco', 'paella@gmail.com', '2023-02-01', '', 100, 4),
(20, 'Mario', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '96833173E', 'manuel', 'turisooooo', '987456321', '', '2023-02-01', '', 100, 2),
(21, 'trabajador', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '22951807S', 'trabajador', 'hola', '987456321', 'trabajador@gmail.com', '2023-02-02', '9', 100, 3),
(28, 'adebota', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '23687806Z', 'Adelin', 'bota flama', '987456321', 'adebota02@gmail.com', '2007-01-26', '12', 100, 1),
(29, 'pepito', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '', 'pepito', 'pepito', '', '', '2023-01-28', '12', 200, 2),
(32, 'carlas', '9a14786d7339ed90946f33d52eef466ca5820d11776b92fc69d56ddbb27bb387', 1, '05886550E', 'carlas', 'paulau', '123213123', '', '2023-02-08', '10', 300, 3),
(33, 'matilda', 'e23aca4e773835e40018957f073f0d4cec0d41218ec0352d6a165333e318bac7', 1, '00143588E', 'matilda', 'fernandez', '654878532', 'adse@grfs.com', '2023-02-14', '', 400, 4),
(34, 'hola', 'b221d9dbb083a7f33428d7c2a3c3198ae925614d70210e28716ccaa7cd4ddb79', 1, '18336395J', 'asdf', 'asdfsd', '464535354', 'asdfasdfasdfsdf@gf.es', '2023-02-08', '', 200, 2),
(35, 'peritas', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '54470691K', 'peritas', 'pompeya', '987456321', 'peritas@gmail.com', '2023-02-01', '', 100, 1),
(42, 'asdaasidbuuabi', 'b55126a39f9b1170a32e6f61e4a694c45235e5ac11c05ecd6ff6395de6a11187', 1, '25585469Q', 'asdff', 'adfadf', '987456321', '', '2023-03-20', '9', 300, 3),
(46, 'paella2', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '73229684F', 'ASDSADA', 'ASDASD', '633291767', 'asdasd@gmail.com', '2023-03-17', '', 100, 1),
(48, 'ramona', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '73003467H', 'Sebastien', 'Schweinsteiger', '', '', '2023-03-01', '', 300, 3),
(52, 'mario', '5d389f5e2e34c6b0bad96581c22cee0be36dcf627cd73af4d4cccacd9ef40cc3', 1, '89606856Y', 'Mario', 'Merio', '664220889', 'mariiito@gmail.com', '2001-03-14', '9', 300, 3),
(53, 'Gil', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '29424187B', 'Gil', 'Pablo', '978789789', 'gilpa@gmail.com', '2023-03-30', '9', 300, 3),
(57, 'popopoopopopooppoopopop', 'c601879e517d4c952039dc0853d03ad7b2ca4080218a5dd6099b9b2aaf6ced77', 1, '73219684F', 'asdasd', 'asdada', '633391767', 'dasdasd@gmail.com', '2023-03-18', '', 100, 1),
(58, 'qwesdaddad', '09e5b4a729253753608cf8fd1ff4d0ea89527c28fcdaebf68fd52adec24062dd', 1, '71229684F', 'asdasd', 'sdasdsad', '633391767', 'adasd@gmail.com', '2023-03-27', '10', 300, 3),
(59, 'asdasdsa', 'bb9d0fc45b1657c9d09ff5d948d5b1dcdc706f43777ac7675bb639ba6debc010', 1, '70229684F', 'sdasd', 'asdasd', '633391767', 'asdasd@gmail.com', '2023-03-16', '', 100, 1),
(61, 'sadasdas', '226042f6aeb4911068f463bc720a5d91aa217197640981abd6c4723c45ae3723', 1, '71222224F', 'aasd', 'dasdas', '631391167', 'casdads@gmail.com', '2023-03-17', '', 100, 1),
(62, 'sadads', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 1, '71221114F', 'sadsad', 'asdada', '632291167', 'casdads@gmail.com', '2023-03-23', '', 100, 1),
(63, 'asdasd', '2faecd2b1f2c9628fd0ab0068287fbe0a3c5f2156f21e2c5724e3bffaaff5979', 1, '73111684F', 'asdasd', 'asdasd', '631191167', 'asdasd@gmail.com', '2023-03-30', '', 100, 1),
(64, 'adadvxcvxv', 'a21baedc2da13a0b3541566257b6c58a560222db0f7841a0e29b40ce4cb2cace', 1, '71278824F', 'asdasd', 'adsad', '631161167', 'asdas@gmail.com', '2023-03-16', '', 100, 1),
(65, 'asdasdadasdsadsadas', '114bd151f8fb0c58642d2170da4ae7d7c57977260ac2cc8905306cab6b2acabc', 1, '70269666Z', 'asdasd', 'asdsd', '633391767', 'adsasd@gmail.com', '2023-03-16', '', 100, 1),
(66, 'zxczxcxzcxcxzczcx', 'ceda1a5b5a59cba7b47c8004cd52692b9133f66dd5005d709ce9813fa31e3d71', 1, '73299984F', 'asdsa', 'asdasd', '633391767', 'asdads@gmail.com', '2023-03-21', '', 100, 1),
(69, 'asdadasdsadsdzx', 'a21baedc2da13a0b3541566257b6c58a560222db0f7841a0e29b40ce4cb2cace', 1, '70555684F', 'asdsad', 'asdada', '633391767', 'asdasd@gmail.com', '2023-03-17', '', 100, 1),
(71, 'asdasdds', '767f4a1d56bee7358576e006c8a9d17c7efd12a4357ea6d1fd530fafd587da41', 1, '73229633C', 'ASDSAD', 'ASDSAD', '633391767', 'asdads@gmail.com', '2023-03-18', '', 100, 1),
(73, 'vxvcvxcvxcv', '9a3601102bd3c5505aec8377fd531c93c320cc7acea48e72ce9a0bc7accdc979', 1, '70555622Z', 'asdasdsa', 'asdsad', '633391767', 'asdasd@gmail.com', '2023-03-30', '', 100, 1),
(74, 'samuel', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '38371148H', 'Samuel', 'Gómez', '642225589', 'samuel@gmail.com', '2023-03-02', '11', 300, 3),
(75, 'isa', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '05777870V', 'Isabela', 'Isa', '669669545', 'isa@gmail.com', '2023-03-30', '12', 400, 4),
(76, 'ronaldinho', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '65270712R', 'Ronaldinho', 'Da Silva', '611025987', 'dinho@gmail.com', '1974-03-01', '12', 300, 3),
(77, 'kessie', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '18476755G', 'Frack', 'Kessie', '978798330', 'kessie@gmail.com', '1984-06-30', '11', 300, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `idPrestamo` int NOT NULL,
  `importe` double NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `idPersona` int DEFAULT NULL,
  `idEstado` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`idPrestamo`, `importe`, `titulo`, `fechaInicio`, `fechaFin`, `idPersona`, `idEstado`) VALUES
(6, 70412, 'quepasatrolls', '2023-03-01', '2023-03-10', 1, 3),
(12, 1234, 'adelin', '2023-03-08', '2023-03-02', 1, 2),
(21, 987654321000, 'Adelin mamamuie', '2023-03-08', '2023-03-10', 28, 3),
(23, 13, 'a', '2023-03-13', '2023-03-16', 1, 1),
(24, 123123, 'sadasd', '2023-03-13', '2023-03-31', 1, 1),
(25, 777, 'sdasdasdas', '2023-03-13', '2023-03-18', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `tipo`) VALUES
(100, 'admin'),
(200, 'profesor'),
(300, 'trabajador'),
(400, 'madrina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipobeca`
--

CREATE TABLE `tipobeca` (
  `idTipo` int NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipobeca`
--

INSERT INTO `tipobeca` (`idTipo`, `nombre`) VALUES
(1, 'Carrera'),
(2, 'Refugio'),
(3, 'Jose Ramón de la Morena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomovimiento`
--

CREATE TABLE `tipomovimiento` (
  `idTipo` int NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipomovimiento`
--

INSERT INTO `tipomovimiento` (`idTipo`, `nombre`) VALUES
(1, 'Gasto'),
(2, 'Ingreso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopersona`
--

CREATE TABLE `tipopersona` (
  `idTipo` int NOT NULL,
  `nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipopersona`
--

INSERT INTO `tipopersona` (`idTipo`, `nombre`) VALUES
(1, 'Admin'),
(2, 'Profesor'),
(3, 'Trabajador'),
(4, 'Madrina');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abono`
--
ALTER TABLE `abono`
  ADD PRIMARY KEY (`idAbono`,`idPrestamo`),
  ADD KEY `idPrestamo` (`idPrestamo`),
  ADD KEY `idMovimiento` (`idMovimiento`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idAlumno`),
  ADD KEY `idGenero` (`idGenero`);

--
-- Indices de la tabla `beca`
--
ALTER TABLE `beca`
  ADD PRIMARY KEY (`idBeca`),
  ADD KEY `idTipo` (`idTipo`),
  ADD KEY `idCentro` (`idCentro`),
  ADD KEY `idMadrina` (`idPersona`),
  ADD KEY `idAlumno` (`idAlumno`);

--
-- Indices de la tabla `centro`
--
ALTER TABLE `centro`
  ADD PRIMARY KEY (`idCentro`),
  ADD KEY `idCiudad` (`idCiudad`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idCiudad`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`),
  ADD KEY `idEspecialidad` (`idEspecialidad`),
  ADD KEY `idProfesor` (`idPersona`),
  ADD KEY `fk_curso_movimiento1_idx` (`movimiento_idMovimiento`);

--
-- Indices de la tabla `curso_material`
--
ALTER TABLE `curso_material`
  ADD PRIMARY KEY (`idMaterial`,`idCurso`),
  ADD KEY `idCurso` (`idCurso`);

--
-- Indices de la tabla `curso_persona`
--
ALTER TABLE `curso_persona`
  ADD PRIMARY KEY (`idCurso`,`idTrabajador`),
  ADD KEY `idTrabajador` (`idTrabajador`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idEspecialidad`);

--
-- Indices de la tabla `especialidad_persona`
--
ALTER TABLE `especialidad_persona`
  ADD PRIMARY KEY (`idEspecialidad`,`idTrabajador`),
  ADD KEY `idTrabajador` (`idTrabajador`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idMaterial`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`idMovimiento`),
  ADD KEY `idTipo` (`idTipo`),
  ADD KEY `idBeca` (`idBeca`),
  ADD KEY `idPrestamo` (`idPrestamo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`),
  ADD UNIQUE KEY `DNI` (`DNI`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idTipo` (`idTipo`),
  ADD KEY `cursoActual` (`cursoActual`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`idPrestamo`),
  ADD KEY `idPersona` (`idPersona`),
  ADD KEY `idTipo` (`idEstado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `tipobeca`
--
ALTER TABLE `tipobeca`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `tipomovimiento`
--
ALTER TABLE `tipomovimiento`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `tipopersona`
--
ALTER TABLE `tipopersona`
  ADD PRIMARY KEY (`idTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abono`
--
ALTER TABLE `abono`
  MODIFY `idAbono` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idAlumno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `beca`
--
ALTER TABLE `beca`
  MODIFY `idBeca` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `centro`
--
ALTER TABLE `centro`
  MODIFY `idCentro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `idCiudad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idEspecialidad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `idMaterial` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `idMovimiento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `idPrestamo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT de la tabla `tipobeca`
--
ALTER TABLE `tipobeca`
  MODIFY `idTipo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipomovimiento`
--
ALTER TABLE `tipomovimiento`
  MODIFY `idTipo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipopersona`
--
ALTER TABLE `tipopersona`
  MODIFY `idTipo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abono`
--
ALTER TABLE `abono`
  ADD CONSTRAINT `abono_ibfk_1` FOREIGN KEY (`idPrestamo`) REFERENCES `prestamo` (`idPrestamo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abono_ibfk_2` FOREIGN KEY (`idMovimiento`) REFERENCES `movimiento` (`idMovimiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `genero_ibfk_1` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `beca`
--
ALTER TABLE `beca`
  ADD CONSTRAINT `beca_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipobeca` (`idTipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beca_ibfk_2` FOREIGN KEY (`idCentro`) REFERENCES `centro` (`idCentro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beca_ibfk_3` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beca_ibfk_4` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`idAlumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `centro`
--
ALTER TABLE `centro`
  ADD CONSTRAINT `centro_ibfk_1` FOREIGN KEY (`idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidad` (`idEspecialidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_ibfk_2` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_curso_movimiento1` FOREIGN KEY (`movimiento_idMovimiento`) REFERENCES `movimiento` (`idMovimiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso_material`
--
ALTER TABLE `curso_material`
  ADD CONSTRAINT `curso_material_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`idCurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_material_ibfk_2` FOREIGN KEY (`idMaterial`) REFERENCES `material` (`idMaterial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso_persona`
--
ALTER TABLE `curso_persona`
  ADD CONSTRAINT `curso_persona_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`idCurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_persona_ibfk_2` FOREIGN KEY (`idTrabajador`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `especialidad_persona`
--
ALTER TABLE `especialidad_persona`
  ADD CONSTRAINT `especialidad_persona_ibfk_1` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidad` (`idEspecialidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `especialidad_persona_ibfk_2` FOREIGN KEY (`idTrabajador`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipomovimiento` (`idTipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimiento_ibfk_2` FOREIGN KEY (`idBeca`) REFERENCES `beca` (`idBeca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimiento_ibfk_3` FOREIGN KEY (`idPrestamo`) REFERENCES `prestamo` (`idPrestamo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`idTipo`) REFERENCES `tipopersona` (`idTipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`%` EVENT `UpdateEstado` ON SCHEDULE EVERY 1 DAY STARTS '2023-03-09 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE prestamo SET prestamo.idEstado = '4' WHERE CURDATE() > fechaFin$$$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
