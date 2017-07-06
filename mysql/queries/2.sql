SELECT
  SUM(`amount`) AS `sum`,
  YEAR(`paymentDate`) AS `year`
FROM `payments`
GROUP BY YEAR(`paymentDate`);
