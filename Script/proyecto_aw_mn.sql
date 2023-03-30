-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2023 a las 02:59:45
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_aw_mn`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCedula` (IN `pCedula` VARCHAR(20))   BEGIN

	SELECT 	Cedula, Contrasenna
    FROM   	usuario
    WHERE  	Cedula = pCedula;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `IniciarSesion` (IN `pCorreoElectronico` VARCHAR(70), IN `pContrasenna` VARCHAR(10))   BEGIN

	SELECT  ConsecutivoUsuario,
    		CorreoElectronico,
            Estado,
            T.TipoUsuario,
            T.NombreTipoUsuario 'PerfilUsuario'
	FROM  USUARIO U
    INNER JOIN tipos_usuarios T ON U.TipoUsuario = T.TipoUsuario 
    WHERE 	CorreoElectronico = pCorreoElectronico
    	AND	Contrasenna = pContrasenna
    	AND Estado = 1;
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarUsuarios` (IN `pNombre` VARCHAR(100), IN `pApellidos` VARCHAR(100), IN `pCedula` VARCHAR(20), IN `pCorreoElectronico` VARCHAR(70), IN `pTelefono` VARCHAR(8), IN `pContrasenna` VARCHAR(10))   BEGIN
	DECLARE P_Estado BIT(1);
    DECLARE P_TipoUsuario TINYINT(4);
    DECLARE P_ConsecutivoUsuario BIGINT(20);
    
    SET P_ConsecutivoUsuario = (SELECT IFNULL(MAX(ConsecutivoUsuario) ,0) +1 FROM USUARIO);
    SET P_Estado = 1;
    SET P_TipoUsuario = 2;
    
    INSERT INTO USUARIO(
    	ConsecutivoUsuario,
        Cedula,
        Nombre,
        Apellidos,
    	CorreoElectronico,
        Telefono,
    	Contrasenna,
    	Estado,
    	TipoUsuario)
   	VALUES(
        P_ConsecutivoUsuario,
        pCedula,
        pNombre,
        pApellidos,
    	pCorreoElectronico,
        pTelefono,
        pContrasenna,
        P_Estado,
        P_TipoUsuario);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ConsecutivoFactura` int(11) NOT NULL,
  `ConsecutivoUsuario` bigint(20) NOT NULL,
  `Codigo_Producto` int(11) NOT NULL,
  `Nombre_Producto` varchar(100) NOT NULL,
  `Precio_Unitario` int(11) NOT NULL,
  `Precio_Total` int(11) NOT NULL,
  `Descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ConsecutivoProducto` bigint(20) NOT NULL,
  `Codigo_Producto` int(11) NOT NULL,
  `Nombre_Producto` varchar(200) NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuarios`
--

CREATE TABLE `tipos_usuarios` (
  `TipoUsuario` tinyint(4) NOT NULL,
  `NombreTipoUsuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_usuarios`
--

INSERT INTO `tipos_usuarios` (`TipoUsuario`, `NombreTipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ConsecutivoUsuario` bigint(20) NOT NULL,
  `Cedula` varchar(20) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `CorreoElectronico` varchar(70) NOT NULL,
  `Telefono` varchar(8) NOT NULL,
  `Contrasenna` varchar(10) NOT NULL,
  `Estado` bit(1) NOT NULL,
  `TipoUsuario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ConsecutivoUsuario`, `Cedula`, `Nombre`, `Apellidos`, `CorreoElectronico`, `Telefono`, `Contrasenna`, `Estado`, `TipoUsuario`) VALUES
(1, '117020932', 'Brandon', 'Ruiz Miranda', 'brandruiz7@gmail.com', '72153137', 'fidelitas', b'1', 1),
(3, '117020932', 'Brandon', 'Ruiz Miranda', 'brandruiz7@gmail.com', '72153137', 'b', b'1', 2),
(4, '222222222', 'Brenda', 'Ruiz Miranda', 'brendruiz2@gmail.com', '22222222', 'a', b'1', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ConsecutivoFactura`),
  ADD KEY `ConsecutivoUsuario` (`ConsecutivoUsuario`,`Codigo_Producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ConsecutivoProducto`);

--
-- Indices de la tabla `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  ADD PRIMARY KEY (`TipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ConsecutivoUsuario`),
  ADD KEY `CorreoElectronico` (`CorreoElectronico`,`TipoUsuario`),
  ADD KEY `fk_tipos_usuarios` (`TipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ConsecutivoFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ConsecutivoProducto` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  MODIFY `TipoUsuario` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ConsecutivoUsuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_tipos_usuarios` FOREIGN KEY (`TipoUsuario`) REFERENCES `tipos_usuarios` (`TipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
