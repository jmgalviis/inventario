CREATE TRIGGER `inventario`.`producto_BEFORE_INSERT` BEFORE INSERT ON `producto` FOR EACH ROW
BEGIN
INSERT INTO inventario
(stock,fech_ingreso,producto_id_producto)
VALUES (0,CURDATE(),NEW.id_producto);
END
