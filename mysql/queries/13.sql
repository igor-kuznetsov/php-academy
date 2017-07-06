SELECT
  MONTH(`paymentDate`) as `month`,
  YEAR(`paymentDate`) as `year`,
  MAX(`amount`)
FROM `payments`
GROUP BY `year`, `month`;