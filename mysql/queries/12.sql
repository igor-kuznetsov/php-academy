SELECT
  `paymentDate`,
  SUM(`amount`)
FROM `payments`
GROUP BY `paymentDate`;


SELECT
  DAY(`paymentDate`) as `day`,
  MONTH(`paymentDate`) as `month`,
  YEAR(`paymentDate`) as `year`,
  SUM(`amount`)
FROM `payments`
GROUP BY `paymentDate`
ORDER BY
  `year`,
  `month`,
  `day`;