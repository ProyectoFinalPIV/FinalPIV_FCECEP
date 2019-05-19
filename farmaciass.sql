-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2019 a las 05:34:50
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmacias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_codi` int(10) NOT NULL,
  `admin_nom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_admin`
--

INSERT INTO `tb_admin` (`admin_codi`, `admin_nom`) VALUES
(1, 'miguel'),
(2, 'mario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_admin_farmacia`
--

CREATE TABLE `tb_admin_farmacia` (
  `admin_farma_codi` int(10) UNSIGNED NOT NULL COMMENT 'Codigo administrador de farmacia',
  `emple_codi` int(10) UNSIGNED NOT NULL COMMENT 'Nombre Administrador de Farmacia'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ciudad`
--

CREATE TABLE `tb_ciudad` (
  `ciudad_id` int(10) NOT NULL,
  `ciudad_nom` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `pais_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_ciudad`
--

INSERT INTO `tb_ciudad` (`ciudad_id`, `ciudad_nom`, `pais_id`) VALUES
(1, 'Cali', 1),
(2, 'Medellin', 1),
(3, 'bogota', 1),
(4, 'neiva', 1),
(5, 'cartago', 1),
(6, 'popayan', 1),
(7, 'guachene', 1),
(8, 'santander', 1),
(9, 'yumbo', 1),
(10, 'palmira', 1),
(11, 'tulua', 1),
(12, 'jamundi', 1),
(13, 'Panamá', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `cliente_codi` int(10) UNSIGNED NOT NULL COMMENT 'codigo del cliente',
  `cliente_cedula` int(20) NOT NULL COMMENT 'c?dula del empleado',
  `docu_codi` int(10) UNSIGNED NOT NULL COMMENT 'tipo documento',
  `gene_codi` int(10) UNSIGNED NOT NULL COMMENT 'Genero',
  `cliente_nomb` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'Nombre del cliente',
  `cliente_apel` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Primer apellido',
  `cliente_apel2` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Segundo apellido',
  `cliente_fec_nac` date NOT NULL COMMENT 'Fecha de Nacimiento',
  `cliente_tel` int(20) NOT NULL COMMENT 'Numero de telefono',
  `cliente_cel` int(25) NOT NULL COMMENT 'Numero de celular',
  `cliente_dir` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Direcci?n cliente',
  `ciudad_id` int(10) UNSIGNED NOT NULL COMMENT 'Ciudad del cliente'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_cliente`
--

INSERT INTO `tb_cliente` (`cliente_codi`, `cliente_cedula`, `docu_codi`, `gene_codi`, `cliente_nomb`, `cliente_apel`, `cliente_apel2`, `cliente_fec_nac`, `cliente_tel`, `cliente_cel`, `cliente_dir`, `ciudad_id`) VALUES
(4, 24389122, 1, 1, 'maria', 'ma', 'v', '0000-00-00', 5555555, 315888888, 'cra1 calle2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_departamento`
--

CREATE TABLE `tb_departamento` (
  `depa_codi` int(10) UNSIGNED NOT NULL COMMENT 'codigo del departamento',
  `depa_nomb` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre del Departamento',
  `pais_id` int(10) UNSIGNED NOT NULL COMMENT 'Codigo del pais'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_empleado`
--

CREATE TABLE `tb_empleado` (
  `emple_codi` int(10) UNSIGNED NOT NULL,
  `emple_cedula` int(20) NOT NULL COMMENT 'Cedula del empleado',
  `docu_codi` int(10) UNSIGNED NOT NULL COMMENT 'Tipo de documento',
  `emple_nomb` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre del empleado',
  `emple_apel` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'apellidos del empleado',
  `emple_apel2` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Segundo apellido',
  `emple_fec_nac` date NOT NULL COMMENT 'Fecha Nacimiento',
  `emple_tel` int(20) UNSIGNED NOT NULL COMMENT 'telefono del empleado',
  `sang_codi` int(10) UNSIGNED NOT NULL COMMENT 'Tipo de sangre',
  `emple_dir` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Direcci?n del empleado',
  `ciudad_id` int(10) UNSIGNED NOT NULL COMMENT 'Ciudad del empleado',
  `esta_civi_codi` int(10) UNSIGNED NOT NULL COMMENT 'estado civil',
  `emple_correo` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Correo electr?nico',
  `emple_cel` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_civil`
--

CREATE TABLE `tb_estado_civil` (
  `esta_civi_codi` int(10) UNSIGNED NOT NULL COMMENT 'Codigo Estado Civil',
  `esta_civi_nomb` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre estado civil'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_factura`
--

CREATE TABLE `tb_factura` (
  `factu_codi` int(10) UNSIGNED NOT NULL COMMENT 'C?digo de la factura',
  `Factu_num` int(20) NOT NULL COMMENT 'Numero de la Factura',
  `factu_fecha` date NOT NULL COMMENT 'Fecha de la factura',
  `cliente_codi` int(10) UNSIGNED NOT NULL COMMENT 'Nombre del cliente',
  `produ_codi` int(10) UNSIGNED NOT NULL COMMENT 'Nombre del producto',
  `factu_iva` int(10) NOT NULL COMMENT 'Iva del producto',
  `factu_total` int(30) NOT NULL COMMENT 'Total de la venta'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_farmacia`
--

CREATE TABLE `tb_farmacia` (
  `farma_codi` int(10) UNSIGNED NOT NULL COMMENT 'codigo de la farmacia',
  `farma_nomb` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre de la farmacia',
  `farma_dir` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Direcci?n de la farmacia',
  `ciudad_id` int(10) UNSIGNED NOT NULL COMMENT 'Ciudad de la farmacia',
  `farma_tel` int(20) NOT NULL COMMENT 'Telefono de la farmacia'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_farmacia`
--

INSERT INTO `tb_farmacia` (`farma_codi`, `farma_nomb`, `farma_dir`, `ciudad_id`, `farma_tel`) VALUES
(1, 'Farmacia A', 'Cra1 calle23', 1, 5555555);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_genero`
--

CREATE TABLE `tb_genero` (
  `gene_codi` int(10) UNSIGNED NOT NULL COMMENT 'codigo genero',
  `gene_nomb` varchar(20) NOT NULL COMMENT 'nombre del genero'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_genero`
--

INSERT INTO `tb_genero` (`gene_codi`, `gene_nomb`) VALUES
(1, 'M'),
(2, 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_login`
--

CREATE TABLE `tb_login` (
  `login_codi` int(10) UNSIGNED NOT NULL,
  `login_nick` varchar(20) NOT NULL COMMENT 'usuario',
  `login_pass` varchar(20) NOT NULL COMMENT 'contrasena',
  `login_esta` varchar(20) NOT NULL COMMENT 'estado',
  `rol_id` int(10) NOT NULL COMMENT 'ID de Rol',
  `emple_codi` int(10) NOT NULL COMMENT 'c?digo empleado',
  `admin_codi` int(10) NOT NULL COMMENT 'c?digo administrador',
  `admin_farma_codi` int(10) NOT NULL COMMENT 'c?digo administrador de farmacia',
  `cliente_codi` int(10) NOT NULL COMMENT 'c?digo del cliente'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_login`
--

INSERT INTO `tb_login` (`login_codi`, `login_nick`, `login_pass`, `login_esta`, `rol_id`, `emple_codi`, `admin_codi`, `admin_farma_codi`, `cliente_codi`) VALUES
(1, 'miguel', 'miansa0616', 'activo', 1, 0, 0, 1, 0),
(3, 'mario', 'mario3', 'activo', 3, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pais`
--

CREATE TABLE `tb_pais` (
  `pais_id` int(10) NOT NULL,
  `pais_nom` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_pais`
--

INSERT INTO `tb_pais` (`pais_id`, `pais_nom`) VALUES
(1, 'Colombia'),
(2, 'Panamá'),
(3, 'EEUU'),
(7, 'Ecuador'),
(4, 'Chile');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_producto`
--

CREATE TABLE `tb_producto` (
  `produ_codi` int(10) UNSIGNED NOT NULL COMMENT 'C?digo del Producto ',
  `produ_nomb` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre del Producto',
  `produ_precio` int(30) NOT NULL COMMENT 'Precio del Producto',
  `produ_stock` int(30) NOT NULL COMMENT 'cantidad en stock',
  `prove_codi` int(10) NOT NULL COMMENT 'Nombre del proveedor '
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_producto`
--

INSERT INTO `tb_producto` (`produ_codi`, `produ_nomb`, `produ_precio`, `produ_stock`, `prove_codi`) VALUES
(1, 'Dolex', 1000, 60, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_propietario`
--

CREATE TABLE `tb_propietario` (
  `propi_codi` int(10) UNSIGNED NOT NULL COMMENT 'Codigo delPropietario',
  `propi_cedula` int(20) NOT NULL COMMENT 'Numero c?dula del propietario',
  `docu_codi` int(10) UNSIGNED NOT NULL COMMENT 'Tipo de Documento',
  `propi_nomb` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre del Propietario',
  `propi_apel` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Primer Apellido',
  `propi_apel2` varchar(30) CHARACTER SET utf32 COLLATE utf32_spanish2_ci NOT NULL COMMENT 'Segundo Apellido',
  `propi_dir` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Direccion del propietario',
  `ciudad_id` int(10) UNSIGNED NOT NULL COMMENT 'Nombre de la ciudad',
  `farma_codi` int(10) UNSIGNED NOT NULL COMMENT 'Nombre de la farmacia',
  `propi_tel` int(20) NOT NULL COMMENT 'Numero de tel?fono '
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proveedor`
--

CREATE TABLE `tb_proveedor` (
  `prove_codi` int(10) UNSIGNED NOT NULL COMMENT 'codigo del proveedor',
  `prove_cedula` int(20) NOT NULL COMMENT 'c?dula del cliente',
  `docu_codi` int(10) UNSIGNED NOT NULL COMMENT 'tipo documento',
  `prove_dir` varchar(70) NOT NULL COMMENT 'direcci?n del proveedor',
  `ciudad_id` int(10) UNSIGNED NOT NULL COMMENT 'ciudad del proveedor ',
  `prove_nomb_comer` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre comercial del proveedor',
  `prove_tel` int(20) NOT NULL COMMENT 'Telefono proveedor',
  `prove_repre` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'Nombre del Representante'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_proveedor`
--

INSERT INTO `tb_proveedor` (`prove_codi`, `prove_cedula`, `docu_codi`, `prove_dir`, `ciudad_id`, `prove_nomb_comer`, `prove_tel`, `prove_repre`) VALUES
(1, 5757575, 1, 'Cra1', 1, 'Glaxo', 7775777, 'Marco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rol`
--

CREATE TABLE `tb_rol` (
  `rol_id` int(10) NOT NULL,
  `rol_nom` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `rol_desc` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_rol`
--

INSERT INTO `tb_rol` (`rol_id`, `rol_nom`, `rol_desc`) VALUES
(1, 'admin', 'administrador'),
(2, 'empleado', 'gestion farmacia'),
(3, 'administrador farmac', 'Gestion farmacia'),
(4, 'cliente', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_documento`
--

CREATE TABLE `tb_tipo_documento` (
  `docu_codi` int(10) NOT NULL COMMENT 'codigo tipo de documento',
  `docu_nomb` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre tipo de documento'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_tipo_documento`
--

INSERT INTO `tb_tipo_documento` (`docu_codi`, `docu_nomb`) VALUES
(1, 'Cedula (CC)'),
(2, 'Pasaporte (TP)'),
(3, 'Cedula Extranjeria (CE)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_sangre`
--

CREATE TABLE `tb_tipo_sangre` (
  `sang_codi` int(10) UNSIGNED NOT NULL COMMENT 'c?digo tipo de sangre',
  `sang_nomb` varchar(5) CHARACTER SET latin1 NOT NULL COMMENT 'nombre tipo de sangre'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_codi`);

--
-- Indices de la tabla `tb_admin_farmacia`
--
ALTER TABLE `tb_admin_farmacia`
  ADD PRIMARY KEY (`admin_farma_codi`);

--
-- Indices de la tabla `tb_ciudad`
--
ALTER TABLE `tb_ciudad`
  ADD PRIMARY KEY (`ciudad_id`);

--
-- Indices de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`cliente_codi`);

--
-- Indices de la tabla `tb_departamento`
--
ALTER TABLE `tb_departamento`
  ADD PRIMARY KEY (`depa_codi`);

--
-- Indices de la tabla `tb_empleado`
--
ALTER TABLE `tb_empleado`
  ADD PRIMARY KEY (`emple_codi`);

--
-- Indices de la tabla `tb_estado_civil`
--
ALTER TABLE `tb_estado_civil`
  ADD PRIMARY KEY (`esta_civi_codi`);

--
-- Indices de la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  ADD PRIMARY KEY (`factu_codi`);

--
-- Indices de la tabla `tb_farmacia`
--
ALTER TABLE `tb_farmacia`
  ADD PRIMARY KEY (`farma_codi`);

--
-- Indices de la tabla `tb_genero`
--
ALTER TABLE `tb_genero`
  ADD PRIMARY KEY (`gene_codi`);

--
-- Indices de la tabla `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`login_codi`);

--
-- Indices de la tabla `tb_pais`
--
ALTER TABLE `tb_pais`
  ADD PRIMARY KEY (`pais_id`);

--
-- Indices de la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  ADD PRIMARY KEY (`produ_codi`);

--
-- Indices de la tabla `tb_propietario`
--
ALTER TABLE `tb_propietario`
  ADD PRIMARY KEY (`propi_codi`);

--
-- Indices de la tabla `tb_proveedor`
--
ALTER TABLE `tb_proveedor`
  ADD PRIMARY KEY (`prove_codi`);

--
-- Indices de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `tb_tipo_documento`
--
ALTER TABLE `tb_tipo_documento`
  ADD PRIMARY KEY (`docu_codi`),
  ADD KEY `docu_nomb` (`docu_nomb`);

--
-- Indices de la tabla `tb_tipo_sangre`
--
ALTER TABLE `tb_tipo_sangre`
  ADD PRIMARY KEY (`sang_codi`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_codi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_admin_farmacia`
--
ALTER TABLE `tb_admin_farmacia`
  MODIFY `admin_farma_codi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Codigo administrador de farmacia';

--
-- AUTO_INCREMENT de la tabla `tb_ciudad`
--
ALTER TABLE `tb_ciudad`
  MODIFY `ciudad_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `cliente_codi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'codigo del cliente', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_departamento`
--
ALTER TABLE `tb_departamento`
  MODIFY `depa_codi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'codigo del departamento';

--
-- AUTO_INCREMENT de la tabla `tb_empleado`
--
ALTER TABLE `tb_empleado`
  MODIFY `emple_codi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_estado_civil`
--
ALTER TABLE `tb_estado_civil`
  MODIFY `esta_civi_codi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Codigo Estado Civil';

--
-- AUTO_INCREMENT de la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  MODIFY `factu_codi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'C?digo de la factura';

--
-- AUTO_INCREMENT de la tabla `tb_farmacia`
--
ALTER TABLE `tb_farmacia`
  MODIFY `farma_codi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'codigo de la farmacia', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_genero`
--
ALTER TABLE `tb_genero`
  MODIFY `gene_codi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'codigo genero', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `login_codi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_pais`
--
ALTER TABLE `tb_pais`
  MODIFY `pais_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  MODIFY `produ_codi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'C?digo del Producto ', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_propietario`
--
ALTER TABLE `tb_propietario`
  MODIFY `propi_codi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Codigo delPropietario';

--
-- AUTO_INCREMENT de la tabla `tb_proveedor`
--
ALTER TABLE `tb_proveedor`
  MODIFY `prove_codi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'codigo del proveedor', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  MODIFY `rol_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_documento`
--
ALTER TABLE `tb_tipo_documento`
  MODIFY `docu_codi` int(10) NOT NULL AUTO_INCREMENT COMMENT 'codigo tipo de documento', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_sangre`
--
ALTER TABLE `tb_tipo_sangre`
  MODIFY `sang_codi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'c?digo tipo de sangre';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
