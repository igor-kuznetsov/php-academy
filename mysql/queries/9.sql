SELECT
  `orderNumber`,
  SUM(`quantityOrdered`) AS `quantity`
FROM `orderdetails`
GROUP BY `orderNumber`;


SELECT
  `orderNumber`,
  SUM(`quantityOrdered`) AS `quantity`
FROM `orderdetails`
GROUP BY `orderNumber`
ORDER BY `quantity` DESC
LIMIT 1;