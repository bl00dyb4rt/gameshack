

INSERT INTO `articulos` (`id`, `idcategoria`, `codigo`, `nombre`, `precio_venta`, `stock`, `descripcion`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 6, '014785239', 'Jabón de tocador', '10.50', 100, NULL, 1, NULL, NULL),
(2, 5, '36985214', 'Gaseosa Pepsi 1.5 LT', '2.00', 100, NULL, 1, '2018-02-23 23:18:00', '2018-02-23 23:18:00'),
(5, 8, '0123644', 'Carne de pollo', '5.00', 100, 'carnes de pollo y gallina', 1, '2018-02-23 23:18:57', '2018-02-24 01:57:22'),
(6, 5, '145236982', 'Gaseosa Inka Kola 2LT', '5.00', 100, 'Gaseosa inka kola 2 litros', 1, '2018-02-23 23:26:52', '2018-02-27 03:52:14'),
(7, 5, '11223344', 'Gaseosa Pepsi 600 ml', '3.00', 100, NULL, 1, '2018-02-24 11:09:45', '2018-02-27 03:54:04'),
(8, 5, '111222333', 'Gaseosa CocaCola 1LT', '5.00', 200, 'Gaseosa CocaCola', 1, '2018-02-24 11:22:05', '2018-02-24 11:33:16'),
(9, 3, '8717868005604', 'Leche evaporada gloria 400g', '4.00', 500, 'Leche evaporada gloria tarro azul', 1, '2018-02-27 04:00:37', '2018-02-27 04:01:41');

-- --------------------------------------------------------


INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'Embutidos', 'Todo tipo de carnes rojas', 1, NULL, '2018-02-08 21:47:34'),
(2, 'Cereales', 'Todos los cereales', 0, NULL, '2018-02-08 21:37:55'),
(3, 'Lácteos', 'productos derivados de la leche', 1, '2018-02-08 06:45:53', '2018-02-08 06:45:53'),
(4, 'Menestras', 'todas las menestras', 1, '2018-02-08 06:53:41', '2018-02-08 06:53:41'),
(5, 'Bebidas', 'todas las bebidas', 1, '2018-02-08 06:54:04', '2018-02-08 06:54:04'),
(6, 'Artículos de Limpieza', 'Todos los artículos de limpieza', 1, '2018-02-08 07:36:55', '2018-02-08 20:04:48'),
(7, 'Carnes', 'Todas las carnes', 1, '2018-02-08 07:37:29', '2018-02-08 07:37:29'),
(8, 'Carnes blancas', 'todas las carnes blancas', 1, '2018-02-21 04:48:28', '2018-02-21 04:58:47'),
(9, 'Carnes cocidas', 'todas las carnes cocidas', 1, '2018-02-21 04:51:02', '2018-02-21 04:58:38'),
(10, 'Carnes procesadas', 'todas las carnes procesadas', 1, '2018-02-21 04:57:45', '2018-02-21 04:59:01'),
(11, 'Carnes de pescado', 'Todos los pescados', 1, '2018-02-21 05:00:05', '2018-02-21 05:00:05'),
(12, 'útiles escolares', 'Todos los artículos escolares', 0, '2018-02-21 10:22:46', '2018-02-21 10:22:57'),
(13, 'Muebles de oficina', 'todos los muebles de oficina pequeños', 1, '2018-02-21 22:07:00', '2018-02-21 22:08:01');

-- --------------------------------------------------------



INSERT INTO `personas` (`id`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Luis Arcila', 'DNI', '96325417', 'Josée Gálvez 1368 - Chongoyape', '931742905', 'luis.pad7@gmail.com', NULL, NULL),
(2, 'Leo Perez Dávila', 'DNI', '63214589', 'Zarumilla 113 - Salaverry', '963123523', 'leoperez@gmail.com', '2018-03-06 07:39:33', '2018-03-06 07:40:06'),
(3, 'Inversiones Leon SAC', 'RUC', '20154878961', 'AV. Lambayeque 150', '963254123', 'inversionesleon@gmail.com', NULL, NULL),
(4, 'Transportes MICASA SAA', 'RUC', '20145236982', 'Av. Atahualpa 122', '074562582', 'transportesmicasa@gmail.com', '2018-03-06 09:44:44', '2018-03-06 09:45:18'),
(8, 'Juan Carlos Arcila Diaz', 'DNI', '47715777', 'Zarumilla 113 - Chiclayo', '931742904', 'jcarlos.ad7@gmail.com', '2018-03-13 21:39:10', '2018-03-13 21:39:10'),
(9, 'Pedro Montenegro', 'DNI', NULL, NULL, NULL, NULL, '2018-03-21 23:58:35', '2018-03-22 00:05:29'),
(10, 'Maria Chocano', 'DNI', NULL, NULL, NULL, NULL, '2018-03-22 00:05:48', '2018-03-22 00:05:48');

-- --------------------------------------------------------



INSERT INTO `proveedores` (`id`, `contacto`, `telefono_contacto`) VALUES
(3, 'Roberto Leon ', '98745632'),
(4, 'Rodolfo Gutierrez', '965874152');

-- --------------------------------------------------------



