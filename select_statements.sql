-- User Stories

-- Selection
-- *** As a user I want to be able to select all the attributes of a table
SELECT * FROM DELIVERY;

-- *** As a user I want to be able to select all the Deliveries happening on a specific day
SELECT *
FROM DELIVERY
WHERE TO_CHAR(DELIVERY.SCHEDULEDDATE, 'YYYY-mm-dd') = '2023-02-25';

-- *** As a user, i want to be able to select all rows of based on the delivery status
SELECT *
FROM DELIVERY
WHERE  TRANSPORTSTATUS = 'in-delivery';
-- ***


-- Projection
-- ** As a user, I want to be able to only see the columns CustomerID, Destination, Scheduled Date, and Delivery time (Ordered by delivery scheduled date in an ascending order)

SELECT CUSTOMERID, DESTINATION,
       TO_CHAR(DELIVERY.SCHEDULEDDATE, 'YYYY-mm-dd') as "Delivery Scheduled date", -- formatting for dates
       TO_CHAR(DELIVERY.DELIVERYTIME, 'HH:MI') as "Delivery time"
FROM  DELIVERY
ORDER BY SCHEDULEDDATE, DELIVERYTIME;

-- As a user, I want to be able to project customerID, total cost, transport_status, driver_license_number,warehouse_name, destination

SELECT CUSTOMERID, TOTALCOST, TRANSPORTSTATUS, DRIVERLICENSENUMBER, WAREHOUSENAME, DESTINATION
FROM DELIVERY;

--calculated output (Sum for now --- add avg, min etc later)
SELECT CUSTOMERID,
       SUM(TOTALCOST) as "Total delivery costs"
FROM DELIVERY
GROUP BY CUSTOMERID;

