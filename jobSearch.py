import requests
from selectolax.lexbor import LexborHTMLParser
import pandas as pd
import os
from pathlib import Path
from dotenv import load_dotenv

env_path = Path(__file__).with_name(".env.example")
load_dotenv(dotenv_path=env_path)

# Parameters from the propeties file
url = os.getenv("LINKED_IN_JOB_LIST_URL")
keywords = os.getenv("KEYWORDS")
location = os.getenv("LOCATION")
date = os.getenv("DATE")
file_name = os.getenv("FILE_NAME")

# Parameters/headers for the request
params = {
    "keywords": keywords,
    "location": location,
    "date": date,
    "start": 0
}
headers = {
    "User-Agent": "Mozilla/5.0"
}

response = requests.get(url, params=params, headers=headers)

tree = LexborHTMLParser(response.text)

jobs = tree.css("li")

# Create the list for the jobs
all_jobs = []

# Loop through the pagination
for start in range(0, 500, 25):
    for job in jobs:
        try:
            job_data = {
                "Job Title": job.css_first(".base-search-card__title").text(strip=True),
                "Company": job.css_first(".base-search-card__subtitle").text(strip=True),
                "Location": job.css_first(".job-search-card__location").text(strip=True),
                "Link": job.css_first(".base-card__full-link").attributes["href"],
            }

            all_jobs.append(job_data)

        except AttributeError:
            continue

# Save the data into a .csv file
df = pd.DataFrame(all_jobs)
df.to_csv(file_name + ".csv", index=False)

print("Saved", len(all_jobs), "jobs")