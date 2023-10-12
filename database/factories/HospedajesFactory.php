<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hospedaje>
 */
class HospedajesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->randomElement(['Casa', 'Hotel', 'Cabaña']);

        $descriptions = [
            'Casa' => fake()->randomElement([
                'Experimenta la comodidad de nuestro alquiler de casa: un refugio acogedor y espacioso que te hará sentir como en casa. Disfruta de una amplia sala de estar, un hermoso jardín y todas las comodidades modernas que necesitas para unas vacaciones relajantes.',
                'Nuestra casa de alquiler es perfecta para escapar de la rutina y relajarte en un entorno tranquilo. Con amplias habitaciones, una cocina totalmente equipada y un patio privado, encontrarás todo lo que necesitas para una estancia inolvidable.',
                'Disfruta de la belleza de la naturaleza desde nuestra casa de alquiler. Rodeada de exuberante vegetación y vistas panorámicas, esta casa es el refugio ideal para los amantes de la tranquilidad. Relájate en la terraza, explora los senderos cercanos o simplemente desconéctate del estrés diario.'
            ]),

            'Hotel' => fake()->randomElement([
                'Bienvenido a nuestro encantador hotel, donde la elegancia y el lujo se combinan para ofrecerte una experiencia inolvidable. Descubre habitaciones cómodas y espaciosas, servicios de primera clase y una ubicación céntrica que te permite explorar la ciudad con facilidad.',
                'Nuestro hotel te brinda la oportunidad de disfrutar de una estancia de ensueño. Desde habitaciones decoradas con elegancia hasta un restaurante galardonado y un personal atento que se preocupa por cada detalle, tu visita será excepcional.',
                'Sumérgete en la sofisticación de nuestro hotel boutique. Cada rincón está diseñado para ofrecer una experiencia única. Relájate en el spa, disfruta de la gastronomía local en nuestro restaurante de renombre y descubre la belleza de la zona desde la comodidad de tu habitación.'
            ]),

            'Cabaña' => fake()->randomElement([
                'Nuestra cabaña rústica es un refugio acogedor en medio de la naturaleza. Disfruta de la tranquilidad de un entorno boscoso, con todas las comodidades modernas. Despiértate con el canto de los pájaros y relájate junto a la chimenea en las noches estrelladas.',
                'Vive la experiencia de una cabaña en el bosque. Nuestra cabaña combina la comodidad con la aventura, ofreciendo un escape de la rutina diaria. Descubre la belleza de la naturaleza, haz senderismo en los senderos cercanos y regresa a una cabaña cálida y acogedora.',
                'Nuestra cabaña de montaña es un refugio perfecto para los amantes de la naturaleza. Situada en un entorno impresionante, te ofrece la oportunidad de desconectar y recargar energías. Disfruta de la privacidad, la vista panorámica y la sensación de estar lejos de todo.'
            ]),
        ];

        $images = [
            'Casa' => fake()->randomElement(['hospedajes/casa1.jpg', 'hospedajes/casa2.jpg', 'hospedajes/casa3.jpg']),
            'Hotel' => fake()->randomElement(['hospedajes/hotel1.jpg', 'hospedajes/hotel2.jpg', 'hospedajes/hotel3.jpg']),
            'Cabaña' => fake()->randomElement(['hospedajes/cabaña1.jpg', 'hospedajes/cabaña2.jpg', 'hospedajes/cabaña3.jpg']),
        ];

        return [
            'title' => $title,
            'description' => $descriptions[$title],
            'price' => fake()->randomFloat(10000, 15000, 20000, 30000),
            'image' => $images[$title],
            'category' => $title,
        ];
    }
}
