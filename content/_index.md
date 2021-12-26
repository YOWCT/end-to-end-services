---
title: "How many government services are available online end-to-end?"
description: "19% of public-facing Government of Canada services in the GC Service Inventory are available online from end-to-end. An Ottawa Civic Tech project."
---

In 2020, the federal Treasury Board Secretariat published [an open data set of Government of Canada services](https://open.canada.ca/data/en/dataset/3ac0d080-6149-499a-8b06-7ce5f00ec56c). This service inventory includes entries from more than 70 federal departments and agencies. Each entry includes a description of the service, which program and department it is part of, a website URL for the service if it exists, and details on what elements of the service are available online.

### Version history

* **2021-12-26:** Updated <a href="#2021-12-26-update">methodology</a>
* **2021-10-13:** Initially launched

[See full version history](https://github.com/YOWCT/end-to-end-services)

### What are "online end-to-end services"?

Services that are available online "end-to-end" are services that can be **fully completed via the internet** from start to finish, without requiring any in-person, mail, phone, or fax-based interactions. 

Online end-to-end services are useful because they can be completed any time of day, from home, from work, or on the road. They're particularly useful to vulnerable or isolated communities who might not be able to access in-person services, and they're typically faster to complete than mail, phone, or fax-based services.

In 2018, the [Digital Industries Economic Strategy Table](https://www.ic.gc.ca/eic/site/098.nsf/vwapj/ISEDC_Digital_Industries.pdf/$FILE/ISEDC_Digital_Industries.pdf) recommended that the Government of Canada "Digitize all public-facing government services so they are accessible by web and mobile phone and available behind a unified login system by 2025." 

### About this analysis

This website uses the [GC Service Inventory data set](https://open.canada.ca/data/en/dataset/3ac0d080-6149-499a-8b06-7ce5f00ec56c) to indicate how many federal government services are available online end-to-end. The complete data set includes entries from 2017-2018, 2018-2019, and 2019-2020. This website uses the **2019-2020 data** since it's the most recent. The service inventory also includes some internal-facing services (or enterprise services provided by a department to other departments). Only **public-facing services** are included in the analysis here.

For each service, the GC Service Inventory includes six categories related to online interactions (registering online, authenticating online, applying for the service online, being informed of a decision online, being issued documentation online, and providing feedback online). Not all categories are applicable to each service, and so for each of the six categories, a service can have a value of "yes", "no", or "not applicable". 

In the analysis on this website, services are considered online end-to-end **if each of the six categories are either "yes" or "not applicable"**. (A service with at least one category of "no" is considered not online end-to-end.) 

<div class="alert alert-secondary" role="alert" id="2021-12-26-update">
    <p style="margin-bottom: 0;"><strong>Update:</strong> As of 2021-12-26, services without any “yes” categories are now considered <b>not</b> online end-to-end. (For example, if all categories are “not applicable”.) To be considered online, services need to have <strong>at least one</strong> “yes” category and zero “no” categories. <a href="https://web.archive.org/web/20211014163050/https://end-to-end-services.github.io/">See previous version</a></p>
</div>

Entries for each service include links to the [Open Government Service Inventory website](https://search.open.canada.ca/service/), where you can read more about each service and see related performance data.

### Missing or incorrect data

Data in the GC Service Inventory is self-reported by departments. If services are missing or include incorrect details, these might be corrected in future updates to the service inventory. For questions about the inventory, you can [email the TBS service inventory team](mailto:ServiceDigital-ServicesNumerique@tbs-sct.gc.ca).

If you notice an error for a specific service, you can click the "Suggest a correction" button displayed on that page. Note that changes suggested here won't be reflected in the official GC Service Inventory. 

### Comparable analyses

* **GC InfoBase:** In [December 2021](https://twitter.com/DigitalCDN/status/1467963787701534720), the Government of Canada [began publishing service inventory data on GC InfoBase](https://www.tbs-sct.gc.ca/ems-sgd/edb-bdd/index-eng.html#infographic/gov/gov/services). The InfoBase analysis includes a breakdown of services by online status, based on the same data categories and 2019-2020 data. The InfoBase methodology lists 1,218 services, with [233 services available online end-to-end](https://www.tbs-sct.gc.ca/ems-sgd/edb-bdd/index-eng.html#infographic/gov/gov/services/.-.-(panel_key.-.-'services_digital_status) ) (19.1% of all services).

### About this project

This is a volunteer project from [Ottawa Civic Tech](https://ottawacivictech.ca/). It is not an official Government of Canada website. 

Learn more about it was built by [visiting the GitHub repository](https://github.com/YOWCT/end-to-end-services).

[Back to the list of departments and agencies](#departments)