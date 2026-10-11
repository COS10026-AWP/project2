<?php

function toListItems(string $text): string
{
    $lines = json_decode($text, true);
    $listItems = '';
    foreach ($lines as $line) {
        if (!empty(trim($line))) {
            $listItems .= '<li>' . htmlspecialchars(trim($line)) . '</li>';
        }
    }
    return $listItems;
}

function toSalary(float $min, float $max): string
{
    $min_salary = number_format($min, 0);
    $max_salary = number_format($max, 0);
    return "\${$min_salary} - \${$max_salary}";
}

function getAvailableJobs(mysqli $db_conn): array|bool
{
    $query = "SELECT * FROM job_listings WHERE job_status = 'active' ORDER BY title ASC";
    $query_res = mysqli_query($db_conn, $query);

    if (is_bool($query_res)) {
        return $query_res;
    } else {
        $res = mysqli_fetch_all($query_res, MYSQLI_ASSOC);
        foreach ($res as &$job) {
            $job['reference_number'] = htmlspecialchars((string) $job['reference_number']);
            $job['title'] = htmlspecialchars((string) $job['title']);
            $job['short_description'] = htmlspecialchars((string) $job['short_description']);
            $job['salary'] = toSalary((float) $job['salary_min'], (float) $job['salary_max']);
            $job['reporting_line'] = htmlspecialchars((string) $job['reporting_line']);
            $job['key_responsibilities'] = toListItems((string) $job['key_responsibilities']);
            $job['essential_requirements'] = toListItems((string) $job['essential_requirements']);
            $job['preferable_requirements'] = toListItems((string) $job['preferable_requirements']);
        }
        unset($job);
        return $res;
    }
}

function getJobsForNav(mysqli $db_conn): array|bool
{
    $query = "SELECT reference_number, title FROM job_listings WHERE job_status = 'active' ORDER BY title ASC";
    $query_res = mysqli_query($db_conn, $query);

    if (is_bool($query_res)) {
        return $query_res;
    } else {
        $res = mysqli_fetch_all($query_res, MYSQLI_ASSOC);
        foreach ($res as &$job) {
            $job['reference_number'] = htmlspecialchars((string) $job['reference_number']);
            $job['title'] = htmlspecialchars((string) $job['title']);
        }
        unset($job);
        return $res;
    }
}
