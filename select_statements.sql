-- Basic Select
SELECT * FROM DELIVERY;

-- Projecting columns: customerID, total cost, transport_status, driver_license_number,warehouse_name, destination

SELECT CUSTOMERID, TOTALCOST, TRANSPORTSTATUS, DRIVERLICENSENUMBER, WAREHOUSENAME, DESTINATION
FROM DELIVERY;

--calculated output
SELECT CUSTOMERID,
       SUM(TOTALCOST) as "Total delivery costs"
FROM DELIVERY
GROUP BY CUSTOMERID;

-- Formatting for dates
SELECT CUSTOMERID,
       TO_CHAR(DELIVERY.SCHEDULEDDATE, 'YYYY-mm-dd') as "Delivery Scheduled date",
       TO_CHAR(DELIVERY.DELIVERYTIME, 'HH:MI') as "Delivery time"
FROM  DELIVERY;

-- Ordered by delivery scheduled date
SELECT CUSTOMERID, DESTINATION,
       TO_CHAR(DELIVERY.SCHEDULEDDATE, 'YYYY-mm-dd') as "Delivery Scheduled date",
       TO_CHAR(DELIVERY.DELIVERYTIME, 'HH:MI') as "Delivery time"
FROM  DELIVERY
ORDER BY SCHEDULEDDATE ASC , DELIVERYTIME ASC ;

-- Filtering rows
SELECT  CUSTOMERID, DESTINATION, DRIVERLICENSENUMBER, TOTALCOST
FROM DELIVERY
WHERE  TRANSPORTSTATUS = 'in-delivery';