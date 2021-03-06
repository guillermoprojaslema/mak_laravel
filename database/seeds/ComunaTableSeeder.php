<?php

use Illuminate\Database\Seeder;
use App\Comuna;

class ComunaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Cargando comunas...');

        $items = [
            /*Metropolitana*/
            ['Santiago', 1],
            ['Cerrillos', 1],
            ['Cerro Navia', 1],
            ['Conchalí', 1],
            ['El Bosque', 1],
            ['Estación Central', 1],
            ['Huechuraba', 1],
            ['Independencia', 1],
            ['La Cisterna', 1],
            ['La Florida', 1],
            ['La Granja', 1],
            ['La Pintana', 1],
            ['La Reina', 1],
            ['Las Condes', 1],
            ['Lo Barnechea', 1],
            ['Lo Espejo', 1],
            ['Lo Prado', 1],
            ['Macul', 1],
            ['Maipú', 1],
            ['Ñuñoa', 1],
            ['Pedro Aguirre Cerda', 1],
            ['Peñalolén', 1],
            ['Providencia', 1],
            ['Pudahuel', 1],
            ['Quilicura', 1],
            ['Quinta Normal', 1],
            ['Recoleta', 1],
            ['Renca', 1],
            ['San Joaquín', 1],
            ['San Miguel', 1],
            ['San Ramón', 1],
            ['Vitacura', 1],
            ['Puente Alto', 1],
            ['Pirque', 1],
            ['San José de Maipo', 1],
            ['Colina', 1],
            ['Lampa', 1],
            ['Tiltil', 1],
            ['San Bernardo', 1],
            ['Buin', 1],
            ['Calera de Tango', 1],
            ['Paine', 1],
            ['Melipilla', 1],
            ['Alhué', 1],
            ['Curacaví', 1],
            ['María Pinto', 1],
            ['San Pedro', 1],
            ['Talagante', 1],
            ['El Monte', 1],
            ['Isla de Maipo', 1],
            ['Padre Hurtado', 1],
            ['Peñaflor', 1],

//            /*Arica y Parinacota*/
//            ['Arica', 2],
//            ['Camarones', 2],
//            ['Putre', 2],
//            ['General Lagos', 2],
//            /*Tarapacá*/
//            ['Iquique', 3],
//            ['Camiña', 3],
//            ['Colchane', 3],
//            ['Huara', 3],
//            ['Pica', 3],
//            ['Pozo Almonte', 3],
//            ['Alto Hospicio', 3],
//            /*Antofagasta*/
//            ['Antofagasta', 4],
//            ['Mejillones', 4],
//            ['Sierra Gorda', 4],
//            ['Taltal', 4],
//            ['Calama', 4],
//            ['Ollagüe', 4],
//            ['San Pedro de Atacama', 4],
//            ['Tocopilla', 4],
//            ['María Elena', 4],
//            /*Atacama*/
//            ['Copiapó', 5],
//            ['Caldera', 5],
//            ['Tierra Amarilla', 5],
//            ['Chañaral', 5],
//            ['Diego de Almagro', 5],
//            ['Vallenar', 5],
//            ['Alto del Carmen', 5],
//            ['Freirina', 5],
//            ['Huasco', 5],
//            /*Coquimbo*/
//            ['La Serena', 6],
//            ['Coquimbo', 6],
//            ['Andacollo', 6],
//            ['La Higuera', 6],
//            ['Paiguano', 6],
//            ['Vicuña', 6],
//            ['Illapel', 6],
//            ['Canela', 6],
//            ['Los Vilos', 6],
//            ['Salamanca', 6],
//            ['Ovalle', 6],
//            ['Combarbalá', 6],
//            ['Monte Patria', 6],
//            ['Punitaqui', 6],
//            ['Río Hurtado', 6],
//            /*Valparaíso*/
//            ['Valparaíso', 7],
//            ['Casablanca', 7],
//            ['Concón', 7],
//            ['Juan Fernández', 7],
//            ['Puchuncaví', 7],
//            ['Quilpué', 7],
//            ['Quintero', 7],
//            ['Villa Alemana', 7],
//            ['Viña del Mar', 7],
//            ['Isla de Pascua', 7],
//            ['Los Andes', 7],
//            ['Calle Larga', 7],
//            ['Rinconada', 7],
//            ['San Esteban', 7],
//            ['La Ligua', 7],
//            ['Cabildo', 7],
//            ['Papudo', 7],
//            ['Petorca', 7],
//            ['Zapallar', 7],
//            ['Quillota', 7],
//            ['Calera', 7],
//            ['Hijuelas', 7],
//            ['La Cruz', 7],
//            ['Limache', 7],
//            ['Nogales', 7],
//            ['Olmué', 7],
//            ['San Antonio', 7],
//            ['Algarrobo', 7],
//            ['Cartagena', 7],
//            ['El Quisco', 7],
//            ['El Tabo', 7],
//            ['Santo Domingo', 7],
//            ['San Felipe', 7],
//            ['Catemu', 7],
//            ['Llay Llay', 7],
//            ['Panquehue', 7],
//            ['Putaendo', 7],
//            ['Santa María', 7],
//            /*O'Higgins*/
//            ['Rancagua', 8],
//            ['Codegua', 8],
//            ['Coinco', 8],
//            ['Coltauco', 8],
//            ['Doñihue', 8],
//            ['Graneros', 8],
//            ['Las Cabras', 8],
//            ['Machalí', 8],
//            ['Malloa', 8],
//            ['Mostazal', 8],
//            ['Olivar', 8],
//            ['Peumo', 8],
//            ['Pichidegua', 8],
//            ['Quinta de Tilcoco', 8],
//            ['Rengo', 8],
//            ['Requinoa', 8],
//            ['San Vicente', 8],
//            ['Pichilemu', 8],
//            ['La Estrella', 8],
//            ['Litueche', 8],
//            ['Marchihue', 8],
//            ['Navidad', 8],
//            ['Paredones', 8],
//            ['San Fernando', 8],
//            ['Chépica', 8],
//            ['Chimbarongo', 8],
//            ['Lolol', 8],
//            ['Nancagua', 8],
//            ['Palmilla', 8],
//            ['Peralillo', 8],
//            ['Placilla', 8],
//            ['Pumanque', 8],
//            ['Santa Cruz', 8],
//            /*Maule*/
//            ['Talca', 9],
//            ['Constitución', 9],
//            ['Curepto', 9],
//            ['Empedrado', 9],
//            ['Maule', 9],
//            ['Pelarco', 9],
//            ['Pencahue', 9],
//            ['Río Claro', 9],
//            ['San Clemente', 9],
//            ['San Rafael', 9],
//            ['Cauquenes', 9],
//            ['Chanco', 9],
//            ['Pelluhue', 9],
//            ['Curicó', 9],
//            ['Hualañé', 9],
//            ['Licantén', 9],
//            ['Molina', 9],
//            ['Rauco', 9],
//            ['Romeral', 9],
//            ['Sagrada Familia', 9],
//            ['Teno', 9],
//            ['Vichuquén', 9],
//            ['Linares', 9],
//            ['Colbún', 9],
//            ['Longaví', 9],
//            ['Parral', 9],
//            ['Retiro', 9],
//            ['San Javier', 9],
//            ['Villa Alegre', 9],
//            ['Yerbas Buenas', 9],
//            /*Ñuble*/
//            ['San Carlos', 10],
//            ['San Fabián', 10],
//            ['Coihueco', 10],
//            ['Ñiquen', 10],
//            ['San Nicolás', 10],
//            ['Bulnes', 10],
//            ['Cobquecura', 10],
//            ['Coelemu', 10],
//            ['Chillán', 10],
//            ['Chillán Viejo', 10],
//            ['El Carmen', 10],
//            ['Ninhue', 10],
//            ['Pemuco', 10],
//            ['Pinto', 10],
//            ['Portezuelo', 10],
//            ['Quillón', 10],
//            ['Quirihue', 10],
//            ['Ranquil', 10],
//            ['San Ignacio', 10],
//            ['Treguaco', 10],
//            ['Yungay', 10],
//            /*Biobío*/
//            ['Concepción', 11],
//            ['Coronel', 11],
//            ['Chiguayante', 11],
//            ['Florida', 11],
//            ['Hualqui', 11],
//            ['Lota', 11],
//            ['Penco', 11],
//            ['San Pedro de la Paz', 11],
//            ['Santa Juana', 11],
//            ['Talcahuano', 11],
//            ['Tomé', 11],
//            ['Hualpén', 11],
//            ['Lebu', 11],
//            ['Arauco', 11],
//            ['Cañete', 11],
//            ['Contulmo', 11],
//            ['Curanilahue', 11],
//            ['Los Alamos', 11],
//            ['Tirúa', 11],
//            ['Los Angeles', 11],
//            ['Antuco', 11],
//            ['Cabrero', 11],
//            ['Laja', 11],
//            ['Mulchén', 11],
//            ['Nacimiento', 11],
//            ['Negrete', 11],
//            ['Quilaco', 11],
//            ['Quilleco', 11],
//            ['San Rosendo', 11],
//            ['Santa Bárbara', 11],
//            ['Tucapel', 11],
//            ['Yumbel', 11],
//            ['Alto Bio Bio', 11],
//            /*La Araucanía*/
//            ['Temuco', 12],
//            ['Carahue', 12],
//            ['Cunco', 12],
//            ['Curarrehue', 12],
//            ['Freire', 12],
//            ['Galvarino', 12],
//            ['Gorbea', 12],
//            ['Lautaro', 12],
//            ['Loncoche', 12],
//            ['Melipeuco', 12],
//            ['Nueva Imperial', 12],
//            ['Padre Las Casas', 12],
//            ['Perquenco', 12],
//            ['Pitrufquén', 12],
//            ['Pucón', 12],
//            ['Saavedra', 12],
//            ['Teodoro Schmidt', 12],
//            ['Toltén', 12],
//            ['Vilcún', 12],
//            ['Villarrica', 12],
//            ['Cholchol', 12],
//            ['Angol', 12],
//            ['Collipulli', 12],
//            ['Curacautín', 12],
//            ['Ercilla', 12],
//            ['Lonquimay', 12],
//            ['Los Sauces', 12],
//            ['Lumaco', 12],
//            ['Purén', 12],
//            ['Renaico', 12],
//            ['Traiguén', 12],
//            ['Victoria', 12],
//            /*Los Ríos*/
//            ['Valdivia', 13],
//            ['Corral', 13],
//            ['Futrono', 13],
//            ['La Unión', 13],
//            ['Lago Ranco', 13],
//            ['Lanco', 13],
//            ['Los Lagos', 13],
//            ['Máfil', 13],
//            ['Mariquina', 13],
//            ['Paillaco', 13],
//            ['Panguipulli', 13],
//            ['Río Bueno', 13],
//            /*Los Lagos*/
//            ['Puerto Montt', 14],
//            ['Calbuco', 14],
//            ['Cochamó', 14],
//            ['Fresia', 14],
//            ['Frutillar', 14],
//            ['Los Muermos', 14],
//            ['Llanquihue', 14],
//            ['Maullín', 14],
//            ['Puerto Varas', 14],
//            ['Castro', 14],
//            ['Ancud', 14],
//            ['Chonchi', 14],
//            ['Curaco de Vélez', 14],
//            ['Dalcahue', 14],
//            ['Puqueldón', 14],
//            ['Queilén', 14],
//            ['Quellón', 14],
//            ['Quemchi', 14],
//            ['Quinchao', 14],
//            ['Osorno', 14],
//            ['Puerto Octay', 14],
//            ['Purranque', 14],
//            ['Puyehue', 14],
//            ['Río Negro', 14],
//            ['San Juan de la Costa', 14],
//            ['San Pablo', 14],
//            ['Chaitén', 14],
//            ['Futalefú', 14],
//            ['Hualaihué', 14],
//            ['Palena', 14],
//            /*Aysén*/
//            ['Coihaique', 15],
//            ['Lago verde', 15],
//            ['Aisén', 15],
//            ['Cisnes', 15],
//            ['Guaitecas', 15],
//            ['Cochrane', 15],
//            ['O\'Higgins', 15],
//            ['Tortel', 15],
//            ['Chile Chico', 15],
//            ['Río Ibáñez', 15],
//            /*Magallanes*/
//            ['Punta Arenas', 16],
//            ['Laguna Blanca', 16],
//            ['Río Verde', 16],
//            ['San Gregorio', 16],
//            ['Navarino', 16],
//            ['Antártica', 16],
//            ['Porvenir', 16],
//            ['Primavera', 16],
//            ['Timaukel', 16],
//            ['Natales', 16],
//            ['Torres del Paine', 16],


            /*Extranjero*/
            /*[1, 'Alemania', 17],
            [1, 'España', 17],
            [1, 'Ecuador', 17],
            [1, 'Noruega', 17],
            [1, 'Nueva Zelanda', 17],
            [1, 'Australia', 17],
            [1, 'Estados Unidos', 17],
            [1, 'Perú', 17],
            [1, 'Bolivia', 17],
            [1, 'Inglaterra', 17],
            [1, 'Francia', 17],
            [1, 'Italia', 17],
            [1, 'México', 17],*/
        ];

        foreach ($items as $item) {
            $comuna = new Comuna();
            $comuna->nombre = $item[0];
            $comuna->region_id = $item[1];
            $comuna->save();
        }

        $this->command->info('Comunas cargados exitosamente');
    }
}
