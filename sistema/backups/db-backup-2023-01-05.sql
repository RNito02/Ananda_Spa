

CREATE TABLE `compra` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_transaccion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Fecha` datetime NOT NULL,
  `Status` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ID_Cliente` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Toal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO compra VALUES("1","4WA63351E2688393N","2022-12-30 23:49:50","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","696.00");
INSERT INTO compra VALUES("2","4PE294970E401035G","2023-01-02 17:08:02","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","1682.00");
INSERT INTO compra VALUES("3","9SX76129DA100451J","2023-01-03 02:28:49","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","174.00");
INSERT INTO compra VALUES("4","65B46136KH161914D","2023-01-03 02:40:41","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","452.00");
INSERT INTO compra VALUES("5","0K594813RH5699523","2023-01-03 16:03:55","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","278.00");
INSERT INTO compra VALUES("6","27H340894C751022L","2023-01-03 17:06:07","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","174.00");
INSERT INTO compra VALUES("7","7C474528EP990502J","2023-01-03 17:27:52","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","278.40");
INSERT INTO compra VALUES("8","3PE345621X276620G","2023-01-04 01:55:18","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","174.00");
INSERT INTO compra VALUES("9","9H323005Y4841463R","2023-01-04 04:42:58","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","174.00");
INSERT INTO compra VALUES("10","23U94585AU163243K","2023-01-04 22:31:20","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","278.40");
INSERT INTO compra VALUES("11","9GE44154U4477931H","2023-01-04 23:39:11","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","278.40");
INSERT INTO compra VALUES("12","7WR34048LG6691151","2023-01-05 01:02:28","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","556.80");
INSERT INTO compra VALUES("13","4W959205BW203884D","2023-01-05 01:06:59","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","1740.00");
INSERT INTO compra VALUES("14","8X293832GA710603A","2023-01-05 08:52:34","COMPLETED","sb-piuvm23967052@personal.example.com","TH4P2DEKMCS5Y","1670.40");





CREATE TABLE `detalle_compra` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Compra` int(11) NOT NULL,
  `ID_producto` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Precio` decimal(10,0) NOT NULL,
  `Cantidad` int(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO detalle_compra VALUES("1","1","1","Bra Frederick Classic","200","3");
INSERT INTO detalle_compra VALUES("2","2","8","Confort Bra","240","5");
INSERT INTO detalle_compra VALUES("3","2","6","Bra Fantastick","250","1");
INSERT INTO detalle_compra VALUES("4","3","7","Bra Unico","150","1");
INSERT INTO detalle_compra VALUES("5","4","7","Bra Unico","150","1");
INSERT INTO detalle_compra VALUES("6","4","8","Confort Bra","240","1");
INSERT INTO detalle_compra VALUES("7","5","8","Confort Bra","240","1");
INSERT INTO detalle_compra VALUES("8","6","7","Bra Unico","150","1");
INSERT INTO detalle_compra VALUES("9","7","8","Confort Bra","240","1");
INSERT INTO detalle_compra VALUES("10","8","7","Bra Unico","150","1");
INSERT INTO detalle_compra VALUES("11","9","7","Bra Unico","150","1");
INSERT INTO detalle_compra VALUES("12","10","8","Confort Bra","240","1");
INSERT INTO detalle_compra VALUES("13","11","8","Confort Bra","240","1");
INSERT INTO detalle_compra VALUES("14","12","8","Confort Bra","240","2");
INSERT INTO detalle_compra VALUES("15","14","8","Confort Bra","240","6");





CREATE TABLE `productos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Precio` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Marca` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `Color` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `Talla` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `Stock` int(11) NOT NULL,
  `URLI` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO productos VALUES("5","Bra Frederick Classic","220","Frederick","Negro","Grande","10","1");
INSERT INTO productos VALUES("6","Bra Fantastick","250","Frederick","Beigh","Grande","10","1");
INSERT INTO productos VALUES("7","Bra Unico","150","Frederick","Beigh","Grande","10","1");
INSERT INTO productos VALUES("8","Confort Bra","240","Frederick","Blanco","Mediana","10","1");
INSERT INTO productos VALUES("9","Confort Light","299","Frederick","Blanco","Grande","10","1");





CREATE TABLE `servicios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `Precio` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Descripcion` varchar(1000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Sexo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `Cantidad_Personas` int(2) NOT NULL,
  `URLI` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO servicios VALUES("1","MASAJE LINFÁTICO","500","Masaje","Hombre/Mujer","1","1");
INSERT INTO servicios VALUES("2","DEPILACION LASER","1000","Se depila mediante laser","Hombre/Mujer","1","1");
INSERT INTO servicios VALUES("3","VACUMTERAPIA","500","La vacumterapia es un procedimiento no invasivo, mecánico mediante aparatología que permite succionar la piel y los tejidos que se encuentran debajo de la piel, de manera tal que realiza una situación de masaje de presión negativa, empujando los tejidos y la piel desde el interior al exterior.","Masculino/Femenino","1","1");
INSERT INTO servicios VALUES("4","CAVITACION","500","La cavitación es un tratamiento estético sin cirugía cuyo propósito es la eliminación de acumulaciones de grasa localizada, favoreciendo la reducción de volumen corporal a través de la utilización de ultrasonidos de baja frecuencia","Hombre/Mujer","1","1");
INSERT INTO servicios VALUES("5","APLICACION DE BOTOX","1000","El bótox es utilizado básicamente para el tratamiento de arrugas de expresión en el tercio superior de la cara: frente, entrecejo y patas de gallo, asegura el doctor Triviño. Es a partir del tercer o cuarto día desde su aplicación cuando el bótox empieza a hacer efecto.","Mujer","1","1");
INSERT INTO servicios VALUES("6","RINOMODELACION","1000","La rinomodelación es un tratamiento que se realiza en consulta para corregir, armonizar y embellecer la forma de la nariz. Para ello, se utilizan sustancias reabsorbibles de relleno, como el ácido hialurónico, con el objetivo de moldear la nariz, hasta lograr el efecto deseado.","Masculino/Femenino","1","1");
INSERT INTO servicios VALUES("7","LIPO-LASER","1000","El lipoláser es un revolucionario láser sin succión ni anestesia, que reduce y elimina la grasa localizada en flancos y abdomen, tanto de mujeres como de hombres, permitiendo una pronta recuperación sin ningún tipo de dolor.","Mujer","1","1");
INSERT INTO servicios VALUES("8","LIMPIEZA FACIAL","1000","La limpieza facial profunda es una técnica específica que se realiza en centros de estética para mejorar la salud y la apariencia del cutis. Este tratamiento elimina los puntos negros y las células muertas, con lo que se consigue que la piel respire y absorba mejor los tratamientos cosméticos o de medicina estética.","Mujer","1","1");
INSERT INTO servicios VALUES("9","RINOMODELACION","1000","La rinomodelación es un tratamiento que se realiza en consulta para corregir, armonizar y embellecer la forma de la nariz. Para ello, se utilizan sustancias reabsorbibles de relleno, como el ácido hialurónico, con el objetivo de moldear la nariz, hasta lograr el efecto deseado.","Masculino/Femenino","1","1");
INSERT INTO servicios VALUES("10","RELLENO DE LABIOS","1000","El relleno de labios con ácido hialurónico es un tratamiento de medicina estética rápido que realizamos sin necesidad de recurrir al bisturí. Se trata de una técnica prácticamente indolora, no obstante, podemos aplicar previamente al tratamiento, anestesia tópica en el área labial","Femenino","1","1");
INSERT INTO servicios VALUES("11","Hilos tensores","1000","Los Hilos Tensores son una de las técnicas de medicina estética más efectivas para rejuvenecer el rostro. Creando una pequeña sensación de tensión en la piel, el paciente podrá eliminar arrugas, mejorar la flacidez facial tan frecuente con el paso de los años y activar la producción natural de colágeno y elastina.","Mujer","1","1");
INSERT INTO servicios VALUES("12","MESOTERAPIA","900","La mesoterapia es un tratamiento de medicina que se utiliza generalmente para la eliminación de la celulitis, el rejuvenecimiento facial, bajar peso mediante la eliminación de bolsas de grasa localizada y el tratamiento de ciertos tipos de alopecia.","FE","1","1");
INSERT INTO servicios VALUES("13","MADEROTERAPIA","450","La maderoterapia es una técnica corporal milenaria y todo un boom en los centros de estética. Los utensilios de madera ayudan a reafirmar y moldear la figura al mismo tiempo que te relajas.","Masculino/Femenino","1","1");
INSERT INTO servicios VALUES("14","MASAJES RELAJANTES","400","El masaje relajante consiste en la realización de maniobras superficiales en las que la intensidad de la presión es suave y el ritmo lento y reiterativo, de manera que al recibir un contacto repetido y constante, se pierde la sensación de dolor y los músculos se relajan.","Masculino/Femenino","1","1");





CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo_usuario` varchar(255) NOT NULL,
  `Ciudad` varchar(30) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Nombre_Completo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO usuarios VALUES("1","Nito","3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79","administrador","","","");
INSERT INTO usuarios VALUES("2","Hugo","3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79","usuario","","","");
INSERT INTO usuarios VALUES("3","Ana","3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79","usuario","Santiago","Noc","Ana Laura Palafox Santiago");



