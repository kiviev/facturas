-- Lista de productos vendidos para un albarán (10)
SELECT  a.id, a.fecha_emision,
        ap.producto_id, ap.cantidad,
        p.precio_venta, p.nombre,
        p.tipo
FROM    albaranes a
JOIN    albaranes_productos ap
ON      (ap.albaran_id = a.id)
JOIN    productos p
ON      (ap.producto_id = p.id)
WHERE   a.id = 10;

-- Precio final por producto de la lista de productos vendidos para un albarán (10)
SELECT  a.id, a.fecha_emision,
        ap.producto_id, ap.cantidad,
        p.precio_venta, p.nombre,
        p.tipo, ap.cantidad*p.precio_venta AS valor_producto
FROM    albaranes a
JOIN    albaranes_productos ap
ON      (ap.albaran_id = a.id)
JOIN    productos p
ON      (ap.producto_id = p.id)
WHERE   a.id = 10;


-- Valor total de venta del albarán
SELECT  a.id, SUM(ap.cantidad*p.precio_venta) AS albaran_sum
FROM    albaranes a
JOIN    albaranes_productos ap
ON      (ap.albaran_id = a.id)
JOIN    productos p
ON      (ap.producto_id = p.id)
WHERE   a.id = 10
GROUP BY a.id;


-- Venta de todos los albaranes
SELECT  a.id, SUM(ap.cantidad*p.precio_venta) AS albaran_sum
FROM    albaranes a
JOIN    albaranes_productos ap
ON      (ap.albaran_id = a.id)
JOIN    productos p
ON      (ap.producto_id = p.id)
GROUP BY a.id;