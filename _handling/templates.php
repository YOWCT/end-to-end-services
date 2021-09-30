<?php

echo "Templates! \n";

$departmentTemplate = '---
title: "$name_en"
summary: "$percentRendered% of the services provided by $name_en are available end-to-end online. $servicesOnline are available online, and $servicesNotOnline are not available online."
nameEn: "$name_en"
nameFr: "$name_fr"
urlEn: "$url_en"
urlFr: "$url_fr"
url: "/gc/$acronym_en/"
servicesOnline: $servicesOnline
servicesNotOnline: $servicesNotOnline
percentage: $percentage
noData: $noData
---
';

$servicesTemplate = '---
title: "$service_name_en"
summary: "The $service_name_en service from $meta_department_name_en $meta_status_text end-to-end online, according to the GC Service Inventory."
url: "gc/$meta_department_acronym_en/$service_id"
department: "$meta_department_name_en"
departmentAcronym: "$meta_department_acronym_en"
serviceId: "$service_id"
onlineEndtoEnd: $meta_end_to_end
serviceDescription: "$service_description_en"
serviceUrl: "$service_url_en"
programDescription: "$program_name_en"
---
';
