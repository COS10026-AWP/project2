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

function filterJobs(mysqli $db_conn, string $select, ?string $search = null): array|bool
{
    // Private function, $select is not user input
    $sql = "SELECT {$select}
            FROM job_listings
            WHERE job_status = 'active'";
    if (!is_null($search)) {
        $sql .= " AND (title LIKE ? OR short_description LIKE ?)";
    }
    $sql .= " ORDER BY title ASC";

    $stmt = mysqli_prepare($db_conn, $sql);

    if (is_bool($stmt)) {
        error_log('Database query preparation error: ' . mysqli_error($db_conn));
        return false;
    }

    if (!is_null($search)) {
        $pattern = '%' . $search . '%';
        $_ = mysqli_stmt_bind_param($stmt, 'ss', $pattern, $pattern);
    }

    $_ = mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (is_bool($result)) {
        error_log('Database query execution error: ' . mysqli_error($db_conn));
        return false;
    }
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getAvailableJobs(mysqli $db_conn, ?string $search = null): array|bool
{
    $query_res = filterJobs($db_conn, '*', $search);

    if (is_bool($query_res)) {
        return $query_res;
    } else {
        foreach ($query_res as &$job) {
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
        return $query_res;
    }
}

function getJobsForNav(mysqli $db_conn, ?string $search = null): array|bool
{
    $query_res = filterJobs($db_conn, 'reference_number, title', $search);

    if (is_bool($query_res)) {
        return $query_res;
    } else {
        foreach ($query_res as &$job) {
            $job['reference_number'] = htmlspecialchars((string) $job['reference_number']);
            $job['title'] = htmlspecialchars((string) $job['title']);
        }
        unset($job);
        return $query_res;
    }
}
