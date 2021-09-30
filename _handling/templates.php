<?php

echo "Templates! \n";

$departmentTemplate = '---
title: "$name_en"
url: "/gc/$acronym_en/"
servicesOnline: $servicesOnline
servicesNotOnline: $servicesNotOnline
percentage: $percentage
noData: $noData
---
';

$servicesTemplate = '---
title: "$service_name_en"
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
