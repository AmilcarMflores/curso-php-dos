<?php
declare(strict_types=1); // <-- a nivel de archivo y arriba del todo

const API_URL = "https://whenisthenextmcufilm.com/api";

function get_data(string $url): array{
    $result = file_get_contents($url); // si solo quieres hacer un GET de una API
    $data = json_decode($result, true);
    return $data;
} 

function get_until_message(int $days): string{
    return match (true) {
    $days === 0    => "¡Hoy se estrena! 🎉",
    $days === 1   => "Mañana se estrena 🚀",
    $days < 7   => "Esta semana se estrena, ¡prepárate! 🍿",
    $days < 30 => "Este mes se estrena, ¡no te lo pierdas! 🎬",
    default     => "$days días para el estreno 📅",
    };
}
?>