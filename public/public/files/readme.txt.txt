curl --location 'https://isd.philrice.gov.ph/api_center/api/login' \
--header 'Accept: application/json' \
--form 'username="hrisapi-ojt"' \
--form 'password="P@ssw0rd"'

ito yung login api para maka generate sila ng token
-Kuya Tim

curl --location 'https://isd.philrice.gov.ph/api_center/api/hris/employees' \
--header 'Authorization: Bearer 131|yd6cocEEIJYZY4htTKlMloQTKbtI6k72Nf1Urhzn'

ito naman yung API pra makuha nila ung lahat ng employees
-kuya Tim