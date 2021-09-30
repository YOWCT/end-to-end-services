# How many government services are available online end-to-end in Canada?

This repository powers [a website analyzing how many Government of Canada services are available online from end-to-end](https://end-to-end-services.github.io/).

It uses [Hugo](https://gohugo.io) and was adapted from the [Large Government of Canada IT projects analysis site](https://github.com/YOWCT/large-government-of-canada-it-projects).

The code here is licensed under the [MIT License](https://github.com/YOWCT/large-government-of-canada-it-projects/blob/master/LICENSE). 

## Usage instructions

### Installing Hugo

Development of this website requires [Hugo](https://gohugo.io/getting-started/installing), [npm](https://nodejs.org/en/download/), and [php](https://www.php.net/manual/en/install.php).

After cloning the repository, run:

```
npm install
```

to install the [gh-pages](https://github.com/tschaub/gh-pages) package used for deployments.

### Data updates

The [`_handling`](https://github.com/YOWCT/end-to-end-services/tree/main/_handling) folder includes two PHP scripts that automatically generate each of the pages in Hugo's [`content`](https://github.com/YOWCT/end-to-end-services/tree/main/content) directory. 

To download the latest version of the [GC Service Inventory](https://open.canada.ca/data/en/dataset/3ac0d080-6149-499a-8b06-7ce5f00ec56c) [CSV file](https://open.canada.ca/data/dataset/3ac0d080-6149-499a-8b06-7ce5f00ec56c/resource/3acf79c0-a5f5-4d9a-a30d-fb5ceba4b60a/download/service_inventory.csv), run:

```
php _handling/download.php
```

Once complete, to generate the content pages from the CSV file, run:

```
php _handling/parse.php
```

The [`overrideCSV`](https://github.com/YOWCT/end-to-end-services/tree/main/_handling/overrideCSV) folder includes CSV files that normalize department names and add additional metadata for departments and agencies.

Note that the front-matter metadata description in [`end-to-end-services/content/_index.md`](https://github.com/YOWCT/end-to-end-services/blob/main/content/_index.md) currently needs to be updated manually. All other data is generated automatically from the service inventory or the override CSV files. 

Automatically-generated content files are still Git-tracked in order to simplify deployments to [GitHub Pages](https://pages.github.com/).

### Local development

For local development, use Hugo's built-in server:

```
hugo server -D --disableFastRender
```

To deploy updates to GitHub Pages, use:

```
npm run deploy
```

## An [Ottawa Civic Tech](https://ottawacivictech.ca/) project

This is a volunteer project and is not affiliated with the Government of Canada.
