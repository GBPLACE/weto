<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('properties')->delete();

        \DB::table('properties')->insert(array (
            0 =>
            array (
                'id' => 19,
                'partner_id' => 54,
                'name' => 'TRASTEVERE LOVELY APARTMENT',
                'country_id' => 87,
                'province' => 'Roma',
                'villa_id' => 3,
                'property_type_id' => 5,
                'city' => 'Roma, Metropolitan City of Rome, Italy',
                'address' => 'Via della Scala',
                'number' => '48',
                'capacity' => '00153',
                'number_of_people' => '2',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => '3',
                'description' => 'A bright and charming penthouse in Via della Scala, in the heart of Trastevere. The apartment, romantic and full of charm, has two small terraces, from which you can enjoy a wonderful view of the rooftops of Rome and some domes.

It is furnished with a delicate taste and a poetic aesthetic, in which old and new meet and coexist harmoniously.

A house designed to welcome and pamper guests from afar: a special place, the result of a conservative restoration, which has kept the flavor of the place alive.',
                'price_per_night' => 150.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '0',
                'final_cleaning' => '25',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/trastevere-lovely-apartment/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 1,
                'created_at' => '2020-10-07 10:52:46',
                'updated_at' => '2022-03-30 20:53:18',
            ),
            1 =>
            array (
                'id' => 20,
                'partner_id' => 54,
                'name' => 'VILLA LA QUERCE',
                'country_id' => 87,
                'province' => 'Firenze',
                'villa_id' => 11,
                'property_type_id' => 8,
                'city' => 'Tavarnelle Val di Pesa, Barberino Tavarnelle, Metropolitan City of Florence, Italy',
                'address' => 'Strada Palazzuolo',
                'number' => '46',
                'capacity' => '50028',
                'number_of_people' => '12',
                'bedroom' => '6',
                'bathroom' => '3',
                'floor' => '0',
                'description' => 'The Villa is situated inside an historical Factory in Tuscany, between Florence and Siena , an enchanting view of the Chianti hills and amazing sunsets and it offers the opportunity to spend a relaxing and cultural vacation in a elegant setting.

The Property , around 500 square meters, has been recently renovated and it is based on two floors plus an attic. Villa Querce can comfortably accommodate 10 people, but with the possibility to get even 14 on the ground floor there is a large living room with two fireplaces, a study room with a sofa bed and a bathroom, a dining room, a billiard room and a wonderful kitchen that overlooks a small garden with its ortho of vegetables.

The house holds 6 bedrooms, all with double beds, 3 Bathrooms with both bath and shower, a living room with fireplace and television, a laundry room and an attic where two people can sleep peacefully.',
                'price_per_night' => 1500.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '0',
                'final_cleaning' => '0',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/villa-la-querce-florence-chianti/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-10-07 17:30:56',
                'updated_at' => '2021-03-08 12:41:04',
            ),
            2 =>
            array (
                'id' => 21,
                'partner_id' => 54,
                'name' => 'VILLA I CACHI',
                'country_id' => 87,
                'province' => 'Firenze',
                'villa_id' => 11,
                'property_type_id' => 8,
                'city' => 'Tavarnelle Val di Pesa, Barberino Tavarnelle, Metropolitan City of Florence, Italy',
                'address' => 'Strada Palazzuolo',
                'number' => '46',
                'capacity' => '50028',
                'number_of_people' => '6',
                'bedroom' => '3',
                'bathroom' => '2',
                'floor' => NULL,
                'description' => 'In the heart of Chianti, just 20 minutes from Florence and 30 from Siena, a depandance of an historic farmhouse “I Cachi” just renovated offers the opportunity to spend a relaxing and cultural vacation in an elegant setting. Villa I Cachi offers two double bedrooms with bathrooms “en-suite”, living room with fireplace and a small kitchen well equipped. The house is surrounded by a Mediterranean garden that offers beautiful sunrises and sunsets adjacent to the pool of the Farmhouse.
Adjacent but connected to the “Cachi” is an additional apartment the “Cipressino”, with bathroom and small sitting area. Very romantic and ideal for a couple
Guests have access to the swimming pool (15 x 5) with a personal patio in their garden. Cachi is located within Farm Muricci, reached by a Cypress lined road and surrounded by centuries-old vineyards and olive trees. The location allows you to spend a relaxing time but also opportunities to visit unique places of historical importance and enjoy and appreciate tuscany food and wine. I Cachi is a 30-minute drive from Florence’s station either from the airport of Florence. It can also be reached by a shuttle bus (Sita) adjacent to the station
The house is equipped with: washer, dishwasher, fridge, coffee machine , service and dishes for 6 people.
Bed linen and towels are included.
The heating system, if necessary, is powered by a pellet stove.

The cost of electricity and the pellets are considered extra costs basis on the consumption.',
                'price_per_night' => 400.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => NULL,
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/villa-i-cachi-firenze-chianti/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-10-07 17:44:43',
                'updated_at' => '2021-07-24 23:47:59',
            ),
            3 =>
            array (
                'id' => 22,
                'partner_id' => 54,
                'name' => 'SABAUDIA BAIA ARGENTO',
                'country_id' => 87,
                'province' => 'Latina',
                'villa_id' => 11,
                'property_type_id' => 8,
                'city' => 'Sabaudia, Province of Latina, Italy',
                'address' => 'Via delle Felci',
                'number' => '0',
                'capacity' => '04016',
                'number_of_people' => '8',
                'bedroom' => '3',
                'bathroom' => '2',
                'floor' => '0',
                'description' => 'Comfortable, simple and elegant house, built inside the Silver Bay. 2 km from the sea, reachable by shuttle every half hour or by bike.',
                'price_per_night' => 300.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '20',
                'final_cleaning' => '50',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/sabaudia-baia-dargento/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-10-07 17:59:08',
                'updated_at' => '2021-06-03 22:21:04',
            ),
            4 =>
            array (
                'id' => 23,
                'partner_id' => 54,
                'name' => 'LUXURY VILLA IN CAPRI',
                'country_id' => 87,
                'province' => 'Napoli',
                'villa_id' => 11,
                'property_type_id' => 8,
                'city' => 'Capri, Metropolitan City of Naples, Italy',
                'address' => 'Via Marina Piccola',
                'number' => '29',
                'capacity' => '80076',
                'number_of_people' => '10',
                'bedroom' => '5',
                'bathroom' => '3',
                'floor' => '0',
                'description' => 'The Villa is nowadays a 4 storey private house located on one of the most charming alley of the island. Originally it only had 2 floors and was built in the XIX century for a famous American painter who used it to entertain his many famous guests.

He liked his Villa so much that he painted it with its numerous staircases and terraces, as the setting for a sensuous portrait of a dark-haired woman dressed in pink chiffon in his “Rooftop in Capri”.

In 1940 the last two floors were added. Today the Villa is divided into two apartments belonging to the same family. And has a private elevator. The rental flat is located on the second, third and fourth floor and from every window offers a breathtaking view over the gulf of Naples and the whole island of Capri. The apartment has been charmingly restored just a couple of years ago by the present owner who decorated it with a selection of antique furniture and glass chandeliers belonging to her family since generations. Every room has a private terrace and on the top floor there is a very large terrace partially shaded by a pergola, ideal for dinner parties, sunbathing or just for a moment of relax at sundown.

That offers a 360 degree panorama view of every natural beauty of the island including the Faraglioni. On the second floor there are a fully equipped kitchen, a large living with fireplace and a wonderful terrace (through which you can go to the upper terrace), a smaller dining room connected to the living room and one bedroom (with twin beds) with bathroom (shower).

On the third floor there are a large bedroom with king size bed and bathroom overlooking an ample terrace, a large bedroom with king size bed and marble bathroom. On the top floor there is a very large terrace (90 mq) with incredible view of the gulf of Naples and the whole island a beautiful pergola.

Opening: 1 May-31 October

Features
– External lighting

Close to:
– Seaside
– City center
– Airport
– Tennis court
Distance:
– Nearest Airport Naples 45 min
– Tennis Club 5 min
– Spa 15 min',
                'price_per_night' => 700.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '0',
                'final_cleaning' => '0',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/luxury-villa-in-capri/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-10-07 21:39:00',
                'updated_at' => '2021-06-03 22:21:13',
            ),
            5 =>
            array (
                'id' => 24,
                'partner_id' => 54,
                'name' => 'LUXURY APARTMENT MAZZINI',
                'country_id' => 87,
                'province' => 'Roma',
                'villa_id' => 3,
                'property_type_id' => 1,
                'city' => 'Roma, Metropolitan City of Rome, Italy',
                'address' => 'Via Monte Zebio',
                'number' => '1',
                'capacity' => '00195',
                'number_of_people' => '6',
                'bedroom' => '3',
                'bathroom' => '2',
                'floor' => '1',
            'description' => 'The 150 sq.mt apartment is located on the second floor, with lift and concierge service, of an early 20th century building in via Monte Zebio (Piazza Mazzini) in one of the most elegant neighborhoods in Rome. entrance, corridor, 1 double bedroom, 2 single bedrooms, 2 bathrooms, a large living room and kitchen.',
                'price_per_night' => 160.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '0',
                'final_cleaning' => '35',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/piazza-mazzini-luxury-apartment/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-10-07 21:43:17',
                'updated_at' => '2021-03-08 17:21:57',
            ),
            6 =>
            array (
                'id' => 25,
                'partner_id' => 54,
                'name' => 'LUXURY APARTMENT RIPETTA',
                'country_id' => 87,
                'province' => 'Roma',
                'villa_id' => 3,
                'property_type_id' => 1,
                'city' => 'Roma, Metropolitan City of Rome, Italy',
                'address' => 'Passeggiata di Ripetta',
                'number' => '11',
                'capacity' => '00186',
                'number_of_people' => '4',
                'bedroom' => '2',
                'bathroom' => '2',
                'floor' => '5',
                'description' => 'This lovely 120mq apartment,  situated on the top floor of a historic building with elevator in the heart of Rome, can accommodate up to 4 people. It is just a five minute walk away from Rome’s famous historical sites and the heart of the “Dolce vita”, including Piazza del Popolo, Piazza di Spagna, via del Corso, via del Babuino,  Pantheon and Piazza Navona. Fontana di Trevi is 10 minutes walking distance too.

The district is bustling with first rate restaurants, bars, shops and markets, and offers everything you could possibly need for an unforgettable Roman holiday.

The apartment has been recently renovated while still respecting the structural characteristics of the buildings in the city centre. The utmost attention to detail and comfort in the furnishing  will guarantee a unique experience and wonderful stay in the city. It has two bedrooms, two bathrooms, a spacious living room and dining room and a  kitchen.

The bedrooms are furnished tastefully, the master bedroom has a double bed while the second bedroom has a double bed that can be easily split into 2 single beds.The lounge is very cosy with a big sofa, and small balcony.

The kitchen is fitted with everything necessary for your stay –  fridge-freezer, microwave, coffee maker etc.

The apartment also has air conditioning, a washing machine and WIFI internet connection.

This exceptional apartment very exclusive ,  with a big charming terrace overlooking the TIBER RIVER.',
                'price_per_night' => 200.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '0',
                'final_cleaning' => '50',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/luxury-apartment-ripetta/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-10-07 21:47:24',
                'updated_at' => '2021-04-27 22:09:17',
            ),
            7 =>
            array (
                'id' => 26,
                'partner_id' => 54,
                'name' => 'OLIVE TREES',
                'country_id' => 87,
                'province' => 'Siracusa',
                'villa_id' => 11,
                'property_type_id' => 8,
                'city' => 'Noto, Province of Syracuse, Italy',
                'address' => 'Contrada Vendicari',
                'number' => '0',
                'capacity' => '96017',
                'number_of_people' => '8',
                'bedroom' => '4',
                'bathroom' => '5',
                'floor' => '0',
                'description' => 'Contemporary and elegant villa set among almond and olive trees with sea views over the baroque town of Noto.

The villa lies on the high plains above Noto and is only a few kilometers away from the town. Surrounded by almond and olive trees, the villa boasts beautiful views of Noto and its coast – a typical, and lovely, Sicilian panorama. The villa is furnished tastefully – carefully selected contemporary and traditional art hangs upon its walls, while modern touches blend seamlessly alongside the features of a classic Sicilian villa, from its white stone floors to its outside dining.

The villa is easily accessed via a small road shaded by lemon trees, and multiple entrances give way to the main living space of the house, which includes a dining space, chimney, and general sitting room area. This area gives way to a large and well-equipped kitchen, which when required can be closed off from the living space via a sliding door.

The garden can be easily accessed no matter where you are in the villa. On one side of the house is an office, a television area, and a master bedroom furnished with an en suite bathroom. On the other side, a corridor gives way to another two bedrooms and bathroom. There is also an additional bathroom, as well as a laundry room. Detached from the main house is another master bedroom with en suite, as well as a kitchenette, perfect for morning coffee. This is also where the fitness suite is located, complete with modern gym equipment and a shower room.

Outside, a flight of steps leads to the swimming pool, complete with both solarium and a shaded area – as well as changing room, bathroom and both indoor and outdoor showers. The garden also contains a barbeque and an outside dining space.

The greenery surrounding the villa is ever-changing and abundant, vibrant against the traditional backdrop of white stone walls. Hundred-year-old olive trees dot the property, providing pockets of intimacy perfect for quiet moments in the shade, or for aperitivi with friends surrounded by fragrant jasmine bushes. Meanwhile, the outside dining area, which lies a few meters away from the kitchen, beckons lunches and dinners to be spent under the sun and sky.

ph. Manlio Ajovalasit

Main House:
3 double bedrooms ensuite
Large open space with living/dinig room and kitchen
Studio/TV room
Guest Bathroom
Laundry room
Gym
Bathroom

Dependance:
Ensuite double bedrooms
Kitchenette

Outside:
Pool
Changing room with shower bathroom
External shower
Al fresco dining ( large table for 10 guests)
Barbecue
Kitchen',
                'price_per_night' => 1900.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '0',
                'final_cleaning' => '0',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/olive-trees-villas-noto-sicily/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-10-07 21:54:40',
                'updated_at' => '2021-07-24 23:48:13',
            ),
            8 =>
            array (
                'id' => 27,
                'partner_id' => 54,
                'name' => 'TUSCANY MEDICEA VILLA',
                'country_id' => 87,
                'province' => 'Pistoia',
                'villa_id' => 11,
                'property_type_id' => 8,
                'city' => 'Montevettolini, Province of Pistoia, Italy',
                'address' => 'Via dei Barni',
                'number' => '17',
                'capacity' => '51015',
                'number_of_people' => '12',
                'bedroom' => '5',
                'bathroom' => '5',
                'floor' => '0',
                'description' => 'Villa Medicea of Montevettolini, a grand mansion built in the XVI century, was once one of the 12 somptuous hunting residences of the Granduke Ferdinando I, grandson of the famous Lorenzo de’ Medici il Magnifico. Built on a hill of olive trees and vineyard overlooking the ValdiNievole valley, next to the medioeval village of Montevettolini, the villa has retained its original architectural beauty and serenity.

The Villa has been carefully restored and improved upon by the present owner, prince Borghese, whose family bought the property more than 200 years ago. All the rooms are decorated with antique furniture and paintings, venetian glass chandeliers and persian carpets, while all the bathrooms have been recently renewed.

Guests will feel fortunate to be able to reside in such a unique and truly special atmosphere while enjoying the enchanting Italian garden, the beautiful park, the numerous bedrooms and the large swimming pool.

The villa is 40 minutes by car from the international airports of Florence and Pisa and ten minutes from the railway station of Montecatini. Trains to Florence and Pisa leave every hour.

Ground Floor:

Large kitchen, Large dining room with fireplace, Smaller dining room (ideal for children), Guest bathroom, Large galleria, Two large double bedrooms each with bathroom and tv

First Floor:

Very large living room with fireplace and piano, Smaller living room, Tv room with fireplace, Library containing an antique collection of books,
Billiard room, Private chapel, Two large double bedrooms with antique poster beds each with bathroom (one has also a terrace overlooking the park and the whole valley), Two smaller double bedrooms each with bathroom.

Facilities:

There is satellite dish for tv, fax machine, PC station, Wi-Fi connection. Few rooms have flat screen tv with cd/dvd player and iPod sound dock. In the beautiful garden there is a patio for dining outdoors. Near the swimming pool, that measures 18 mt. x 7mt., there is a ping pong table, a small kitchen for pool snacks and a patio for open air lunches.
A golf course (18 holes), riding stables and tennis courts are nearby (10 minutes drive). Down the hill (5 minutes drive) there is Grotta Giusti Hotel, a very well reknown beauty spa. The little town of Montecatini Terme, famous all over Italy for its thermal waters is only a short distance by car (7 km).

Maximum number of guests: 10-12
Staff: One housekeeper, One cook, One butler, One gardener, One maid, One extra maid 4 h/dd on separate billing by the customer

Distances by car: Florence: 30 minutes, Pisa: 30 minutes, Montecatini: 10 minutes, Forte dei Marmi: 30 minutes, Highway: 5 minutes.',
                'price_per_night' => 2000.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '0',
                'final_cleaning' => '0',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/tuscany-medicea-villa/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-10-07 22:01:38',
                'updated_at' => '2021-03-08 17:22:18',
            ),
            9 =>
            array (
                'id' => 28,
                'partner_id' => 54,
                'name' => 'VINO E OLI EXCLUSIVE APARTMENT',
                'country_id' => 87,
                'province' => 'Roma',
                'villa_id' => 7,
                'property_type_id' => 1,
                'city' => 'Roma, Metropolitan City of Rome, Italy',
                'address' => 'Viale delle Milizie',
                'number' => '11',
                'capacity' => '00192',
                'number_of_people' => '4',
                'bedroom' => '2',
                'bathroom' => '1',
                'floor' => '4',
            'description' => 'Despite the name, Vino e Oli Exclusive is actually very new – it’s just been done up in a beautiful mid-century style. It’s in an old building, so there’s not as much natural light, but that feels like nitpicking. It won’t bother you when you’re soaking in that bathtub. The quality of the windows is very high, which might seem like a strange thing to bring up, but the street outside is very busy (as all of Prati is), and while you might still get some noise, the flat’s far more peaceful than it might otherwise be.',
                'price_per_night' => 150.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '0',
                'final_cleaning' => '35',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/vino-e-oli-deluxe-apartment-in-rome/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-10-07 22:07:31',
                'updated_at' => '2021-06-03 22:21:27',
            ),
            10 =>
            array (
                'id' => 29,
                'partner_id' => 54,
                'name' => 'VINO E OLI LOVELY APARTMENT',
                'country_id' => 87,
                'province' => 'Roma',
                'villa_id' => 7,
                'property_type_id' => 1,
                'city' => 'Roma, Metropolitan City of Rome, Italy',
                'address' => 'Viale delle Milizie',
                'number' => '11',
                'capacity' => '00192',
                'number_of_people' => '4',
                'bedroom' => '2',
                'bathroom' => '1',
                'floor' => '4',
                'description' => 'The entire building in which Vintage Viola sits is made up of rental flats.

This means that there are certain elements that bring hotels to mind, particularly with the services offered – cleaning every other day, and a reception during working hours, for example.

That might worry you about a potential lack of character, but those fears are unfounded. The kitchen’s decent, and allows real independence, and the design is a nice throwback to the middle of the twentieth century.',
                'price_per_night' => 180.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '0',
                'final_cleaning' => '35',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/vino-e-oli-lovely-apartment/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-10-07 22:14:08',
                'updated_at' => '2021-02-10 15:07:30',
            ),
            11 =>
            array (
                'id' => 30,
                'partner_id' => 54,
                'name' => 'VINO E OLI LUXURY APARTMENT',
                'country_id' => 87,
                'province' => 'Roma',
                'villa_id' => 7,
                'property_type_id' => 1,
                'city' => 'Roma, Metropolitan City of Rome, Italy',
                'address' => 'Viale delle Milizie',
                'number' => '11',
                'capacity' => '00192',
                'number_of_people' => '6',
                'bedroom' => '2',
                'bathroom' => '2',
                'floor' => '3',
                'description' => 'Well-suited even for leisurely long-term stays.

Comprised of a spacious living area with TV, two or three windows, a fully equipped kitchen with dining table and a comfortable sofa bed.

With two roomy, well-lit bedrooms provided with king size beds, flat screen TVs and the private bathroom has a large marble shower, bidet, and a courtesy set.

It can accomodate up to six people.',
                'price_per_night' => 200.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '0',
                'final_cleaning' => '35',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/vino-e-oli-luxury-apartment-in-rome/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-10-07 22:18:08',
                'updated_at' => '2021-02-10 15:07:34',
            ),
            12 =>
            array (
                'id' => 31,
                'partner_id' => 54,
                'name' => 'VINO E OLI STUDIO',
                'country_id' => 87,
                'province' => 'Roma',
                'villa_id' => 7,
                'property_type_id' => 1,
                'city' => 'Roma, Metropolitan City of Rome, Italy',
                'address' => 'Viale delle Milizie',
                'number' => '11',
                'capacity' => '00192',
                'number_of_people' => '4',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => '2',
                'description' => 'Ideal for short to medium stays, even for couples with children. Comprised of a living area with TV, two windows, a fully equipped kitchen with dining table and a comfortable sofa bed.

The separate sleeping area is provided with a king size bed and a flat screen TV. The bathroom has a large marble shower or a bathtub, bidet, and a courtesy set.

It can accommodate up to four people.',
                'price_per_night' => 120.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '0',
                'final_cleaning' => '35',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/vino-e-oli-studio-apartment-in-rome/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-10-07 22:20:05',
                'updated_at' => '2021-02-10 15:09:34',
            ),
            13 =>
            array (
                'id' => 44,
                'partner_id' => 54,
                'name' => 'PIAZZA NAVONA LUXURY APARTMENT',
                'country_id' => 87,
                'province' => 'Roma',
                'villa_id' => 3,
                'property_type_id' => 14,
                'city' => 'Roma, Metropolitan City of Rome, Italy',
                'address' => 'Via del Governo Vecchio',
                'number' => '11',
                'capacity' => '00186',
                'number_of_people' => '4',
                'bedroom' => '2',
                'bathroom' => '2',
                'floor' => '2',
                'description' => 'Walking into the apartment you are greeted with a well-lit room with several windows, wood ceilings and tiled flooring. A large living room with a sofa, a pouffe, armchair, coffee table, flat screen TV and a dining table creates a space for all guests to relax. The kitchen is functional in size, and comes complete with anything you would need to prepare a meal.

One bedroom has a double bed, a walk-in closet, and an en suite bathroom. The other larger room has a double bed that can be separated into two twins. The bathrooms both have a rainfall shower, one with chromotherapy. The terrace is the highlight of the apartment.

Its large dimension is a rarity in Central Rome, complete with a small garden collection and a pergola creating a shaded tunnel over the dining/sitting area, it offers fantastic ambience, particularly at night.',
                'price_per_night' => 170.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '0',
                'final_cleaning' => '35',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/luxury-apartment-piazza-navona/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-10-18 16:48:59',
                'updated_at' => '2021-04-27 22:09:38',
            ),
            14 =>
            array (
                'id' => 52,
                'partner_id' => 61,
                'name' => 'GB PLACE',
                'country_id' => 87,
                'province' => 'Roma',
                'villa_id' => 4,
                'property_type_id' => 5,
                'city' => 'Roma, Metropolitan City of Rome, Italy',
                'address' => 'Via Garibaldi',
                'number' => '62',
                'capacity' => '00153',
                'number_of_people' => '2',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => '3',
            'description' => 'Il loft è situato nell\'incantevole e pittoresco quartiere di Trastevere su Via Garibaldi, una delle vie più prestigiose di Roma.  L\'appartamento al secondo piano di un palazzo storico è costituito da un ingresso, una camera da letto, sala da pranzo ampia cucina con balcone, ampio soggiorno luminoso, una camera matrimoniale con vista sul salotto, un bagno con doccia e una zona spogliatoio caratteristici.  Tutti i materiali di finitura prima della ristrutturazione di interni sono stati accuratamente restaurati e conservati, includendo dove l\'intonaco era possibile.  Questo ci ha permesso di creare ambienti dove il passato e il presente insieme, dando la casa la propria identità particolare.  Gli ospiti potranno godere di tutti i comfort che una casa richiede. TV via cavo (Sky Multi Vision) nel salone e zona, notte senza fili 24 h, lavatrice, lavastoviglie, Nespresso.  Il loft, grazie alle sue caratteristiche, è adatto a piccoli eventi privati quali mostre, presentazioni di libri o cene private.',
                'price_per_night' => 200.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => '35',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/luxury-loft-in-rome-gbplace',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-11-21 13:24:13',
                'updated_at' => '2020-11-21 18:38:07',
            ),
            15 =>
            array (
                'id' => 53,
                'partner_id' => 63,
                'name' => 'La Residenza dell Angelo',
                'country_id' => 87,
                'province' => 'Rome',
                'villa_id' => 5,
                'property_type_id' => 14,
                'city' => 'Rome, RM, Italia',
                'address' => 'Via Paola, 46',
                'number' => '+393311624540',
                'capacity' => '00186',
                'number_of_people' => '2',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => '1',
                'description' => 'The Residenza dell’Angelo is a refined and elegant Guest House inaugurated in october 2010, recently renewed, it is located at the first floor of a prestigious XIXth century building and it is provided with an elevator. Situated in the heart of the baroque Rome, not far from the main attractions, it is immersed in a street pattern enriched by typical boutiques, shops and restaurants, in the historical and silent via Paola, that faces the majestic Castel Sant’Angelo.
You will be welcomed with warm hospitality in a refined environment, recently renewed, finely decorated and provided with all comforts to make your stay unique and unforgettable.',
                'price_per_night' => 70.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '30',
                'final_cleaning' => NULL,
                'city_tax' => '3.50',
                'property_url' => 'http://www.residenzadellangelo.com',
                'draft' => 1,
                'verify' => 0,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2020-12-09 15:32:25',
                'updated_at' => '2020-12-09 15:32:25',
            ),
            16 =>
            array (
                'id' => 55,
                'partner_id' => 54,
                'name' => 'LA FOSCA 1BR 1BA',
                'country_id' => 190,
                'province' => 'Washington D.C., DC, USA',
                'villa_id' => 3,
                'property_type_id' => 1,
                'city' => 'Washington D.C., DC, USA',
                'address' => 'D St SE',
                'number' => '146',
                'capacity' => '20003',
                'number_of_people' => '3',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => '0',
                'description' => 'This 1BR 1BA apartment has its own entrance, a full kitchen, central air conditioning and heat, a gas fireplace, and free WiFi.  Many guests return for the unmatched ease and convenience.
We think you\'ll find it\'s just what you need for a short-term stay in the Nation\'s Capital.
Guests have visited us from China, Australia, Brazil, South Africa, India, and all over North America and Europe.',
                'price_per_night' => 130.0,
                'currency' => 'USD - $',
                'each_extra_guest' => '0',
                'final_cleaning' => '80',
                'city_tax' => '5.00',
                'property_url' => 'https://www.lafoscadc.com/short-term-rentals',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-02-09 17:48:56',
                'updated_at' => '2021-02-10 15:14:46',
            ),
            17 =>
            array (
                'id' => 56,
                'partner_id' => 54,
                'name' => 'LA FOSCA UPPER HOUSE',
                'country_id' => 190,
                'province' => 'Washington D.C., DC, USA',
                'villa_id' => 10,
                'property_type_id' => 8,
                'city' => 'Washington D.C., DC, USA',
                'address' => 'D St SE',
                'number' => '149',
                'capacity' => '20003',
                'number_of_people' => '4',
                'bedroom' => '2',
                'bathroom' => '3',
                'floor' => '0',
                'description' => 'We call it the Upper House, and we don\'t mean the Senate.  This 2000 sq. ft. home has two bedrooms and three full bathrooms.  A furnished office completes the layout, including printer, scanner, shredder, and dedicated high-speed internet access. The U.S. Capitol Visitor Center, House Office Buildings, Library of Congress,
RNC, and DNC are all less than fifteen minutes away on foot. Bright, comfortable, and fully renovated, this home includes hardwood and tile floors, ceiling fans, and free WiFi.
La Fosca\'s Upper House is perfect for the professional.

(Sorry, no parties, reunions, fundraisers, or social functions.  Minimum thirty-day stay.)',
                'price_per_night' => 200.0,
                'currency' => 'USD - $',
                'each_extra_guest' => '0',
                'final_cleaning' => '0',
                'city_tax' => '5.00',
                'property_url' => 'https://www.lafoscadc.com/corporate-rentals',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 1,
                'created_at' => '2021-02-09 18:08:08',
                'updated_at' => '2021-02-10 15:15:41',
            ),
            18 =>
            array (
                'id' => 61,
                'partner_id' => 54,
                'name' => 'CAMPO DE FIORI',
                'country_id' => 87,
                'province' => 'Roma',
                'villa_id' => 3,
                'property_type_id' => 5,
                'city' => 'Roma, Metropolitan City of Rome, Italy',
                'address' => 'Piazza Campo de Fiori',
                'number' => '50',
                'capacity' => '00186',
                'number_of_people' => '2',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => '2',
                'description' => 'A charming apartment in Campo de’ Fiori, in the heart of Rome. The apartment, romantic and full of charm which you can enjoy a wonderful view of the Campo de’ Fiori market. It is furnished with a delicate taste. A house designed to welcome and pamper guests. A house designed to experience Rome and its magic.',
                'price_per_night' => 200.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => NULL,
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/campo-de-fiori-charme-homes-apartment/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-02-10 14:59:43',
                'updated_at' => '2021-07-23 03:40:03',
            ),
            19 =>
            array (
                'id' => 62,
                'partner_id' => 54,
                'name' => 'PONGWE JUNIOR SUITE',
                'country_id' => 199,
                'province' => 'Tanzania',
                'villa_id' => 14,
                'property_type_id' => 20,
                'city' => 'Zanzibar, Tanzania',
                'address' => '10 Pongwe Road, Pongwe',
                'number' => '10',
                'capacity' => '10084',
                'number_of_people' => '3',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => NULL,
                'description' => '40 sq. meter suite with a patio, overlooking the sea, the garden and the pool. Furnished in handcrafted African furniture, perfect for a vacation in Zanzibar, surrounded by a seductive and exclusive atmosphere.

Private patio
Garden
Ceiling fan
Elegant soundproof room
Queen size mattress Simmons
Egyptian cotton sheets',
                'price_per_night' => 110.0,
                'currency' => 'USD - $',
                'each_extra_guest' => NULL,
                'final_cleaning' => NULL,
                'city_tax' => '5',
                'property_url' => 'http://www.pongwebayresort.com/rooms/junior-suite-zanzibar/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 1,
                'created_at' => '2021-03-08 12:36:39',
                'updated_at' => '2021-03-08 21:58:25',
            ),
            20 =>
            array (
                'id' => 63,
                'partner_id' => 54,
                'name' => 'PONGWE JUNIOR SEA VIEW',
                'country_id' => 199,
                'province' => 'Tanzania',
                'villa_id' => 14,
                'property_type_id' => 20,
                'city' => 'Zanzibar, Tanzania',
                'address' => '10 Pongwe Road, Pongwe',
                'number' => '10',
                'capacity' => '10084',
                'number_of_people' => '3',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => NULL,
                'description' => '40 sq. meter suite with a patio and view of the garden, sea and pool. Furnished in handcrafted African furniture, perfect for a vacation in Zanzibar, surrounded by a seductive and exclusive atmosphere.',
                'price_per_night' => 107.0,
                'currency' => 'USD - $',
                'each_extra_guest' => NULL,
                'final_cleaning' => NULL,
                'city_tax' => '5',
                'property_url' => 'http://www.pongwebayresort.com/rooms/the-villa-suite-zanzibar/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-03-08 16:06:52',
                'updated_at' => '2021-06-03 22:21:41',
            ),
            21 =>
            array (
                'id' => 64,
                'partner_id' => 54,
                'name' => 'PONGWE DELUXE SEA VIEW',
                'country_id' => 199,
                'province' => 'Tanzania',
                'villa_id' => 14,
                'property_type_id' => 13,
                'city' => 'Zanzibar, Tanzania',
                'address' => '10 Pongwe Road, Pongwe',
                'number' => '10',
                'capacity' => '10084',
                'number_of_people' => '3',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => NULL,
                'description' => 'An entire 45 sq. meter bungalow just for you, with a large veranda furnished in typical Zanzibar style. Exclusive and carefully furnished, ideal for a romantic stay.',
                'price_per_night' => 130.0,
                'currency' => 'USD - $',
                'each_extra_guest' => NULL,
                'final_cleaning' => NULL,
                'city_tax' => '5',
                'property_url' => 'http://www.pongwebayresort.com/rooms/executive-suite-zanzibar/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-03-08 17:06:56',
                'updated_at' => '2021-03-26 16:12:56',
            ),
            22 =>
            array (
                'id' => 65,
                'partner_id' => 54,
                'name' => 'PONGWE MASTER SUITE',
                'country_id' => 199,
                'province' => 'Tanzania',
                'villa_id' => 14,
                'property_type_id' => 12,
                'city' => 'Zanzibar, Tanzania',
                'address' => '10 Pongwe Road, Pongwe',
                'number' => '10',
                'capacity' => '10084',
                'number_of_people' => '3',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => NULL,
            'description' => 'Truly exclusive in its dimensions (60 sq. m) and location, featuring a 20 sq. m. private veranda living room where you can dine or simply relax, enjoying a magnificent view of the ocean and gardens (the suites are situated on the upper floor); Swahili style bathroom with a bath and shower; possibility of one additional beds .',
                'price_per_night' => 150.0,
                'currency' => 'USD - $',
                'each_extra_guest' => NULL,
                'final_cleaning' => NULL,
                'city_tax' => '5',
                'property_url' => 'http://www.pongwebayresort.com/rooms/master-suite-zanzibar/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-03-08 17:20:05',
                'updated_at' => '2021-06-03 22:23:34',
            ),
            23 =>
            array (
                'id' => 66,
                'partner_id' => 54,
                'name' => 'MAISON COROMANDEL',
                'country_id' => 87,
                'province' => 'Aosta',
                'villa_id' => 3,
                'property_type_id' => 1,
                'city' => 'Aymavilles, Aosta Valley, Italy',
                'address' => 'Les, Moulins',
                'number' => '53',
                'capacity' => '11010',
                'number_of_people' => '2',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => NULL,
            'description' => 'The apartment is located two km from the Aosta West exit, very practical to reach all the places to visit and the ski resorts (and everything at halfan hour Max 45min) . The house is on the ground floor and in summer you can use the vegetable garden, garden and BBQ. It\'s all new. It\'s just been renovated. I look forward to seeing you.',
                'price_per_night' => 70.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => '40',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/lovely-maison-in-val-d-aosta-for-winter-and-summer-holidays/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 1,
                'created_at' => '2021-03-08 19:06:08',
                'updated_at' => '2021-03-08 19:22:45',
            ),
            24 =>
            array (
                'id' => 67,
                'partner_id' => 54,
                'name' => '700 SCICLI HOUSE',
                'country_id' => 87,
                'province' => 'Ragusa',
                'villa_id' => 12,
                'property_type_id' => 8,
                'city' => 'Scicli, Scicli, Free municipal consortium of Ragusa, Italy',
                'address' => 'Sampieri strada provinciale',
                'number' => '65',
                'capacity' => '97018',
                'number_of_people' => '8',
                'bedroom' => '4',
                'bathroom' => '3',
                'floor' => '0',
                'description' => 'Casa di campagna risalente alla fine del ‘700, sita nella Valle di Noto in contrada Gerrantini sulla strada provinciale 40 che collega le località di Scicli e Sampieri. La separa dalla strada un lungo viale alberato; un baglio antistante la casa ed un giardino rustico in cui spiccano palme e fichi d’india incorniciano tutto il perimetro della struttura che si compone di un ampio ingresso con caminetto, uno scalone che conduce ad una mansarda con bagno, altre tre camere da letto di cui due molto spaziose, un’ampia sala da pranzo con angolo cottura, un soggiorno anch’esso molto spazioso e due bagni.

Pavimenti di pece, affreschi alle pareti degli ambienti comuni e della mansarda, rendono la residenza molto suggestiva e unica nel suo genere. I muri antichi molto spessi, assicurano ambienti freschi durante i mesi estivi. La casa conserva le caratteristiche di una residenza fuori dagli schemi dei consueti confort offerti dagli hotel. Ideale per chi desidera immergersi in un’atmosfera senza tempo e rivivere un’autentica villeggiatura lontano dagli assilli della vita moderna.

Vicinissima la spiaggia di Sampieri ( 4 km), una delle più belle e conosciute della zona, con la famosa fornace che sorge sulla punta estrema, immortalata più volte nella celebre fiction “ Il Commissario Montalbano”. Andando verso l’interno, altrettanto vicino è Scicli un’autentica perla del barocco siciliano, ricca di palazzi e chiese risalenti a questo periodo storico e artistico e dove si trovano locali e ristoranti dove gustare la tipica cucina siciliana sia in chiave tradizionale che moderna.',
                'price_per_night' => 400.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => '50',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/700-scicli-house-noto-sicily/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-03-26 16:23:42',
                'updated_at' => '2021-03-26 17:28:45',
            ),
            25 =>
            array (
                'id' => 68,
                'partner_id' => 54,
                'name' => 'ANDREA LOFT',
                'country_id' => 87,
                'province' => 'Roma',
                'villa_id' => 4,
                'property_type_id' => 5,
                'city' => 'Roma, Metropolitan City of Rome, Italy',
                'address' => 'Via del Casale Piombino',
                'number' => '21',
                'capacity' => '00135',
                'number_of_people' => '2',
                'bedroom' => '2',
                'bathroom' => '1',
                'floor' => '0',
                'description' => 'An industrial loft, perfect for movie set, commercials, video clips or photo shoots. The windows, together with the large garden, transform the loft into a modern industrial greenhouse.',
                'price_per_night' => 700.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => '100',
                'city_tax' => '3.50',
                'property_url' => 'https://travel.gbplace.co/property/industrial-loft-in-rome-for-shooting-and-movie-set/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-03-26 16:53:30',
                'updated_at' => '2021-03-26 17:28:53',
            ),
            26 =>
            array (
                'id' => 69,
                'partner_id' => 54,
                'name' => 'GIARDINO ESOTICO VILLA',
                'country_id' => 87,
                'province' => 'Napoli',
                'villa_id' => 11,
                'property_type_id' => 8,
                'city' => 'Forio, Metropolitan City of Naples, Italy',
                'address' => 'Via Francesco Calise',
                'number' => '56',
                'capacity' => '80075',
                'number_of_people' => '12',
                'bedroom' => '8',
                'bathroom' => '5',
                'floor' => NULL,
                'description' => 'The Villa is designed in Mediterranean Style and is luxuriously furnished and is built on three floors.

On the Ground floor a Huge Hall leading out onto portico and terrace facing the sea and the garden with a dining room facing the courtyard, a sitting room and a lounge.  A large traditional kitchen with a food storage on the west side facing the garden, also with big barbecue outside. Two twin bedrooms with bathrooms en-suite with French windows leading out on to the Portico and Terrace. One twin bedroom. One bath­room. One single bedroom .

On the First floor two double bedrooms with en-suite bathrooms, air conditoned, both have access to the huge terrace with fantastic views of the sea. One single bedroom. One bathroom. One twin bedroom with bathroom en-suite. One linen-room.

On the Basement, one cellar and winery connected to the kitchen. One garage and a big laundry.

In the shade of the arcades, on the front or the back of the house, you can relax or enjoy a delicious dinner or you can appreciate the heated pool with idromassage.',
                'price_per_night' => 200.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => '40',
                'city_tax' => '3.50',
                'property_url' => 'https://ischiavillagiardinoesotico.com',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-03-26 17:05:39',
                'updated_at' => '2021-03-26 17:28:49',
            ),
            27 =>
            array (
                'id' => 71,
                'partner_id' => 54,
                'name' => 'LA LOCANDA DI PIETRACUPA',
                'country_id' => 87,
                'province' => 'Firenze',
                'villa_id' => 20,
                'property_type_id' => 14,
                'city' => 'Tavarnelle Val di Pesa, Metropolitan City of Florence, Italy',
                'address' => 'Strada di Pietracupa',
                'number' => '31',
                'capacity' => '50028',
                'number_of_people' => '3',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => '1',
                'description' => 'On the upper floor of La Locanda di Pietracupa, four elegant rooms in four relaxing colours, offer a welcoming stay in Chianti, between Florence and Siena. All the rooms have a bathroom with shower, courtesy products and satellite TV. The windows open out onto the beauty of the little old town of San Donato in Poggio or onto the greenery of the Tuscan landscape and the garden, guaranteeing a sensation of calm and relaxation.
You can also enjoy the excellent family-run restaurant mentioned in all gastronomic guides.',
                'price_per_night' => 100.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => 'Included',
                'city_tax' => '2',
                'property_url' => 'https://www.secure-reservation.cloud/booking/v2/check-availability.php?h=locandapietracupa-sandonatoinpoggio&l=en',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 1,
                'created_at' => '2021-04-27 22:04:12',
                'updated_at' => '2021-04-27 22:10:23',
            ),
            28 =>
            array (
                'id' => 72,
                'partner_id' => 80,
                'name' => 'Albergo Rurale Casa Fois',
                'country_id' => 87,
                'province' => 'Sassari',
                'villa_id' => 7,
                'property_type_id' => 14,
                'city' => 'Valledoria, SS, Italia',
                'address' => 'Via Serra di Palma',
                'number' => '0',
                'capacity' => '07039',
                'number_of_people' => '17',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => '1',
                'description' => 'Located on the northern coast of Sardinia, in the ancient region of Anglona, Casa Fois is an old family home dating back to the 19th century, now converted into a rural hotel.



Equipped with 6 rooms - 2 of which are suites, Casa Fois unfolds in the ancient village that tells all about the rural life of the Fois family, whose farm extended for over 200 hectares.



Built with local materials and traditional techniques, an example of Sardinian architecture, Casa Fois is surrounded by hectares of cultivated land artichoke fields, olive trees and centuries-old Mediterranean plants, as well as by fields populated by flocks of sheep and goats; it is a place surrounded by nature with an avant-garde concept respecting both the Mediterranean tradition and Sardinian culture.



Just two kilometers away from the sea, Casa Fois is an enclave of relaxation and rural simplicity.



A contemporary dimension and style in dialogue with an ancient world: tradition and evolution.',
                'price_per_night' => 80.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '40',
                'final_cleaning' => '0',
                'city_tax' => '0',
                'property_url' => 'www.casafois.it',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 1,
                'created_at' => '2021-05-29 19:54:44',
                'updated_at' => '2021-06-03 22:22:22',
            ),
            29 =>
            array (
                'id' => 74,
                'partner_id' => 83,
                'name' => 'VILLA JOLANDA e CARMELO',
                'country_id' => 87,
                'province' => 'Ag',
                'villa_id' => 20,
                'property_type_id' => 8,
                'city' => 'Agrigento',
                'address' => 'via Della Mosella',
                'number' => '41',
                'capacity' => '92100',
                'number_of_people' => '15',
                'bedroom' => '4',
                'bathroom' => '4',
                'floor' => NULL,
                'description' => NULL,
                'price_per_night' => NULL,
                'currency' => NULL,
                'each_extra_guest' => NULL,
                'final_cleaning' => NULL,
                'city_tax' => NULL,
                'property_url' => NULL,
                'draft' => 1,
                'verify' => 0,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-07-23 01:06:54',
                'updated_at' => '2021-07-23 01:06:54',
            ),
            30 =>
            array (
                'id' => 75,
                'partner_id' => 83,
                'name' => 'VILLA JOLANDA e CARMELO',
                'country_id' => 87,
                'province' => 'Ag',
                'villa_id' => 11,
                'property_type_id' => 8,
                'city' => 'Agrigento',
                'address' => 'via Della Mosella',
                'number' => '41',
                'capacity' => '92100',
                'number_of_people' => '15',
                'bedroom' => '4',
                'bathroom' => '4',
                'floor' => NULL,
                'description' => 'Il B&B " VILLA JOLANDA&CARMELO " è una struttura nuova, con stanze elegantemente arredate progettate in maniera razionale e moderna per assicurare agli ospiti un servizio ai massimi livelli del settore, con un\'organizzazione degli spazi pensata per offrire i più moderni confort.

Ogni stanza è dotata di bagno con doccia, riscaldamento e phon.

I servizi includono: prima colazione varia ed abbondante, cambio biancheria giornaliero, aria condizionata e riscaldamenti, TV, WI-FI, frigobar, camera per disabili, ampio parcheggio privato custodito di 1. 500 mq, cucina attrezzata , barbecue, lavatrice e piscina all’aperto di 7 mt x 5 a disposizione dei clienti.

Le nostre colazioni sono abbondanti e varie sia mediterranea che continentale.
Ai nostri ospiti offriamo in una apposita struttura attrezzata una colazione a base di caffè, orzo, cappuccino, the, varie tisane, succhi di frutta, yogurt, cornetti caldi appena sfornati a lievitazione naturale, nutelline, fette biscottate accompagnate da miele burro e marmellate, e la nostra forza sono la granita al limone le buonissime torte fatte in casa che allietano con un intenso profumo il risveglio mattutino dei nostri ospiti.

VILLA JOLANDA & CARMELO "is a new structure, with elegantly furnished rooms designed in a rational and modern way to ensure guests a service at the highest levels of the sector, with an organization of spaces designed to offer the most modern comforts.

Each room has a bathroom with shower, heating, hairdryer, complimentary toiletries and linen

Services include: varied and abundant breakfast, daily change of linen, air conditioning and heating, TV, WI-FI, minibar, room for the disabled, large private parking of 1.500 sqm, equipped kitchen, barbecue, washing machine and swimming pool \'open of 7 meters x 5 available to customers.

Our breakfasts are plentiful and varied both Mediterranean and continental.
To our guests we offer in a special equipped facility a breakfast of coffee, barley, cappuccino, tea, various herbal teas, fruit juices, yoghurt, hot freshly baked croissants with natural leavening, nutella, biscuits accompanied by honey butter and jams, and our strength is the lemon granita, the delicious home-made cakes that brighten up the morning awakening of our guests with an intense aroma.',
                'price_per_night' => 50.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '20',
                'final_cleaning' => '20',
                'city_tax' => '2',
                'property_url' => 'www.bebvillajolanda.com',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-07-23 01:42:50',
                'updated_at' => '2021-09-29 17:30:27',
            ),
            31 =>
            array (
                'id' => 76,
                'partner_id' => 84,
                'name' => 'Hotel Antica Stazione',
                'country_id' => 87,
                'province' => 'Ragusa',
                'villa_id' => 7,
                'property_type_id' => 21,
                'city' => 'Chiaramonte Gulfi',
                'address' => 'Hotel Antica Stazione Cda Santissimo s.p. 8 km 3',
                'number' => '1',
                'capacity' => '97012',
                'number_of_people' => '29',
                'bedroom' => '5',
                'bathroom' => '5',
                'floor' => '2',
                'description' => 'Per sentire profumi e suoni della natura, gustare la cucina tradizionale, toccare con mano il barocco ibleo.

L’hotel Antica Stazione immerso nel verde, confinante con la pineta dei Monti Iblei, unico nella Provincia di Ragusa a quota 860 metri s.l.m. si affaccia da un lato sull’altopiano arricchito da  muretti in pietra a secco, tipici ed esclusivi del ragusano.

Dall’altro lato gode della vista di uno scorcio del paese arroccato sulla collina e una favolosa veduta di tutta la Sicilia orientale.
Le nostre camere sono elegantemente arredate con mobili in legno e offrono tutti i comfort.
L’hotel dispone di un rinomato ristorante-pizzeria-sala trattenimenti con bar, giardino-ristorante estivo, ampio parcheggio privato e area bambinopoli.
Inoltre per la sua ottima posizione panoramica l’albergo è il punto di partenza ideale per il trekking e passeggiate in mountain-bike nei boschi e nelle suggestive cave che ci circondano.
A richiesta escursioni guidate nei centri storici delle cittadine iblee, il cui barocco è stato classificato Patrimonio dell’UNESCO.',
                'price_per_night' => 80.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '20',
                'final_cleaning' => '0',
                'city_tax' => '0',
                'property_url' => 'www.anticastazione.com',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-07-23 16:07:28',
                'updated_at' => '2021-09-29 17:30:38',
            ),
            32 =>
            array (
                'id' => 77,
                'partner_id' => 86,
                'name' => 'IL GIARDINO DI ENEA',
                'country_id' => 87,
                'province' => 'Trapani',
                'villa_id' => 20,
                'property_type_id' => 21,
                'city' => 'Erice, Province of Trapani, Italy',
                'address' => 'VIA ULISSE',
                'number' => '48',
                'capacity' => '91016',
                'number_of_people' => '11',
                'bedroom' => '5',
                'bathroom' => '5',
                'floor' => NULL,
                'description' => 'Il B&B ”Il giardino di Enea“ vi dà il benvenuto nel cuore pulsante della Sicilia, dove il mito s’intreccia con la natura.

Immerso in uno splendido giardino, in posizione tranquilla e rilassante e nello stesso tempo comodo per raggiungere il centro storico.

La vicinanza al mare, raggiungibile anche a piedi, la trasforma in un ottimo punto di partenza per visitare importanti località turistiche e balneari della provincia o per effettuare percorsi cicloturistici.

”Il giardino di Enea”, di recente realizzazione, offre un’atmosfera elegante ed accogliente.

Ideale per chi voglia trascorrere un piacevolissimo soggiorno, e gustare le prelibate colazioni con dolci fatti in casa.

La struttura è inserita in un contesto ambientale tipicamente mediterraneo, caratterizzato da piante di agrumi, piante di ulivo e alberi da frutta.

Il B&B è dotato di un ampio soggiorno recentemente ristrutturato e arredato con gusto moderno dove vengono servite le colazioni.',
                'price_per_night' => 76.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '20',
                'final_cleaning' => 'Pulizia giornaliera',
                'city_tax' => '2',
                'property_url' => 'www.ilgiardinodienea.it',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-07-24 22:48:56',
                'updated_at' => '2022-01-08 20:17:41',
            ),
            33 =>
            array (
                'id' => 78,
                'partner_id' => 86,
                'name' => 'IL GIARDINO DI ENEA',
                'country_id' => 87,
                'province' => 'Trapani',
                'villa_id' => 20,
                'property_type_id' => 21,
                'city' => 'Trapani, Province of Trapani, Italy',
                'address' => 'VIA ULISSE',
                'number' => '48',
                'capacity' => '91016',
                'number_of_people' => '11',
                'bedroom' => '5',
                'bathroom' => '5',
                'floor' => NULL,
                'description' => 'Il B&B ”Il giardino di Enea“ vi dà il benvenuto nel cuore pulsante della Sicilia, dove il mito s’intreccia con la natura.

Immerso in uno splendido giardino, in posizione tranquilla e rilassante e nello stesso tempo comodo per raggiungere il centro storico.

La vicinanza al mare, raggiungibile anche a piedi, la trasforma in un ottimo punto di partenza per visitare importanti località turistiche e balneari della provincia o per effettuare percorsi cicloturistici.

”Il giardino di Enea”, di recente realizzazione, offre un’atmosfera elegante ed accogliente.

Ideale per chi voglia trascorrere un piacevolissimo soggiorno, e gustare le prelibate colazioni con dolci fatti in casa.

La struttura è inserita in un contesto ambientale tipicamente mediterraneo, caratterizzato da piante di agrumi, piante di ulivo e alberi da frutta.

Il B&B è dotato di un ampio soggiorno recentemente ristrutturato e arredato con gusto moderno dove vengono servite le colazioni.',
                'price_per_night' => 70.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '20',
                'final_cleaning' => 'Pulizia giornaliera',
                'city_tax' => '2',
                'property_url' => 'https://www.ilgiardinodienea.it/camere/lavinia.html',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-07-24 22:48:57',
                'updated_at' => '2021-07-28 13:24:52',
            ),
            34 =>
            array (
                'id' => 79,
                'partner_id' => 54,
                'name' => 'Masseria Galeta',
                'country_id' => 87,
                'province' => 'Lecce',
                'villa_id' => 12,
                'property_type_id' => 15,
                'city' => 'Nardò, Province of Lecce, Italy',
                'address' => 'via Rotogaleta',
                'number' => '8',
                'capacity' => '73048',
                'number_of_people' => '2',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => NULL,
                'description' => 'Located in Nardò, Galeta Masseria features accommodations with air conditioning and access to a garden. There is a private bathroom with bidet and a hairdryer in each unit, along with free toiletries.

Guests at the bed and breakfast can enjoy an Italian breakfast.
Gallipoli is 14 mi from Galeta Masseria, while Otranto is 30 mi from the property. The nearest airport is Brindisi - Salento Airport, 28 mi from the accommodations.',
                'price_per_night' => 90.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => NULL,
                'city_tax' => '2',
                'property_url' => 'https://www.galetamasseria.it/en/index.php',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 1,
                'created_at' => '2021-09-29 17:15:10',
                'updated_at' => '2021-09-29 17:29:56',
            ),
            35 =>
            array (
                'id' => 80,
                'partner_id' => 54,
                'name' => 'Masseria Nucci',
                'country_id' => 87,
                'province' => 'Lecce',
                'villa_id' => 12,
                'property_type_id' => 15,
                'city' => 'Nardò, Province of Lecce, Italy',
                'address' => 'Contrada Nucci, SP 112',
                'number' => '6',
                'capacity' => '73048',
                'number_of_people' => '2',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => NULL,
            'description' => 'Masseria Nucci is a beautiful tastefully farmhouse renovated maintaining the rustic style that makes it so unique. The property comprises three main blocks: the tower where are placed the three Superior Rooms on the first floor (double and two quadruple), the family room called ‘il contadino’ which consists of a small apartment on the ground floor featuring a double room with sofa bed, a single room, bathroom, kitchen and outdoor patio; the Deluxe Double Room, also called ‘il custode’, located on the ground floor, consists of a double room with sofa-bed, bathroom and kitchenette. The common areas consist of a large garden, a large porch with facilities and a jacuzzi on request.',
                'price_per_night' => 80.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => NULL,
                'city_tax' => '2',
                'property_url' => 'http://www.masserianucci.it',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 1,
                'created_at' => '2021-09-29 17:28:30',
                'updated_at' => '2021-09-29 17:29:44',
            ),
            36 =>
            array (
                'id' => 81,
                'partner_id' => 54,
                'name' => 'IL PALAZZOTTO SUPERIOR',
                'country_id' => 87,
                'province' => 'Lecce',
                'villa_id' => 20,
                'property_type_id' => 12,
                'city' => 'Lecce, Province of Lecce, Italy',
                'address' => 'Via di Valesio',
                'number' => '93',
                'capacity' => '73100',
                'number_of_people' => '2',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => '3',
                'description' => 'Camera accogliente, posta al terzo e ultimo piano, spaziosa e luminosa, il luogo ideale per vivere una vacanza nel massimo relax e romanticismo.

L’ampia terrazza privata, con vista panoramica sul parco di Villa Reale e sul campanile del Duomo, durante la sera è impreziosita dai bagliori emanati dalle lampade in terracotta intagliate dalle sapienti mani di un artigiano locale, creando così un’atmosfera ovattata di fascino e serenità. Di giorno, l’area solarium, protetta da alti separè di “cannizzi”, consente di godere del calore del sole rimanendo al riparo da occhi indiscreti.

Gli arredi di pregio, il parquet, l’ampio letto matrimoniale e i tessuti di qualità sono tutte caratteristiche che rendono unica questa Suite. Il Bagno, con aereazione forzata, presenta un grande box doccia con maxi soffione, il termoarredo è di design.',
                'price_per_night' => 100.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => NULL,
                'city_tax' => '2',
                'property_url' => 'https://www.ilpalazzottolecce.it/matrimoniale-superior/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 1,
                'created_at' => '2021-09-29 17:55:46',
                'updated_at' => '2021-09-29 17:59:41',
            ),
            37 =>
            array (
                'id' => 82,
                'partner_id' => 54,
                'name' => 'IL PALAZZOTTO APARTMENT',
                'country_id' => 87,
                'province' => 'Lecce',
                'villa_id' => 3,
                'property_type_id' => 1,
                'city' => 'Lecce, Province of Lecce, Italy',
                'address' => 'Via di Valesio',
                'number' => '93',
                'capacity' => '73100',
                'number_of_people' => '4',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => '0',
            'description' => 'Bilocale particolarmente spaziosa (può ospitare da 2 a 4 persone), caratterizzata da ampi soffitti con volte a botte e a stella, vanta un ingresso indipendente al piano terra per una completa autonomia di movimento (accessibile anche i diversamente abili). Dotata di ampia zona living arredata con cucina attrezzata, tavolo e sedie per 4 persone e un divano-letto matrimoniale, la suite risulta impreziosita da elementi che esprimono l’importanza dell’artigianato salentino in grado di coniugare i valori della tradizione con la modernità. La zona notte separata dal living presenta un letto matrimoniale a baldacchino, di impronta minimalista. Il bagno, con aereazione forzata e senza barriere architettoniche, è dotato di ogni comfort in stile spa, dispone di ampio box doccia con maxi soffione, asciugacapelli e linea cortesia.',
                'price_per_night' => 130.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => NULL,
                'city_tax' => '2',
                'property_url' => 'https://www.ilpalazzottolecce.it/appartamento/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2021-09-29 18:57:57',
                'updated_at' => '2022-03-30 20:53:39',
            ),
            38 =>
            array (
                'id' => 83,
                'partner_id' => 88,
                'name' => 'New Design St Peter',
                'country_id' => 87,
                'province' => 'Roma',
                'villa_id' => 5,
                'property_type_id' => 13,
                'city' => 'Roma, RM, Italia',
                'address' => 'Via Famagosta',
                'number' => '8',
                'capacity' => '00192',
                'number_of_people' => '2',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => '4',
            'description' => 'Deluxe Suite (18 sqm) with hot tub and an elegant private bathroom (complete with shower with chromotherapy, toilet, bidet, hairdryer and beauty set eco-friendly).
The room is  furnished in contemporary style, with precious hand-planed parquet, air conditioning, free internet access, smart TV and minibar for a fee',
                'price_per_night' => 150.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => '0',
                'city_tax' => '3.50',
                'property_url' => NULL,
                'draft' => 1,
                'verify' => 0,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2022-01-13 04:56:50',
                'updated_at' => '2022-01-13 04:56:50',
            ),
            39 =>
            array (
                'id' => 84,
                'partner_id' => 88,
                'name' => 'New Design St Peter',
                'country_id' => 87,
                'province' => 'Roma',
                'villa_id' => 5,
                'property_type_id' => 13,
                'city' => 'Roma, RM, Italia',
                'address' => 'Via Famagosta',
                'number' => '8',
                'capacity' => '00192',
                'number_of_people' => '2',
                'bedroom' => '1',
                'bathroom' => '1',
                'floor' => '4',
            'description' => 'Deluxe Suite (18 sqm) with hot tub and an elegant private bathroom (complete with shower with chromotherapy, toilet, bidet, hairdryer and beauty set eco-friendly).
The room is  furnished in contemporary style, with precious hand-planed parquet, air conditioning, free internet access, smart TV and minibar for a fee',
                'price_per_night' => 150.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => NULL,
                'final_cleaning' => '0',
                'city_tax' => '3.50',
                'property_url' => NULL,
                'draft' => 1,
                'verify' => 0,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2022-01-13 04:56:52',
                'updated_at' => '2022-01-13 04:56:52',
            ),
            40 =>
            array (
                'id' => 85,
                'partner_id' => 89,
                'name' => 'Heidi Design Apartment',
                'country_id' => 87,
                'province' => 'SS',
                'villa_id' => 3,
                'property_type_id' => 1,
                'city' => 'Alghero, Province of Sassari, Italy',
                'address' => 'Via Verdi',
                'number' => '11',
                'capacity' => '07041',
                'number_of_people' => '6',
                'bedroom' => '3',
                'bathroom' => '2',
                'floor' => '0',
                'description' => 'This beautiful 3 bedroom, air conditioned apartment is located in a strategic position: a few minutes walk from the heart of the Historic Center and just a short stroll to the Promenade.
Heidi’s apartment sleeps up to 6 people. Fully equipped, 3 bedrooms, 2 of them with queen sized beds, the third room can be twin bedded (upon request) , and 2 bathrooms.
It has a cosy kitchen with a little lounge corner and direct access to the back courtyard',
                'price_per_night' => 150.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '30',
                'final_cleaning' => '35',
                'city_tax' => '0.50',
                'property_url' => 'https://msha.ke/heidisapartments/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 0,
                'created_at' => '2022-03-30 18:05:25',
                'updated_at' => '2022-03-30 18:07:11',
            ),
            41 =>
            array (
                'id' => 86,
                'partner_id' => 89,
                'name' => 'Heidi Design Apartment',
                'country_id' => 87,
                'province' => 'SS',
                'villa_id' => 3,
                'property_type_id' => 1,
                'city' => 'Alghero, Province of Sassari, Italy',
                'address' => 'Via Verdi',
                'number' => '11',
                'capacity' => '07041',
                'number_of_people' => '6',
                'bedroom' => '3',
                'bathroom' => '2',
                'floor' => '0',
                'description' => 'This beautiful 3 bedroom, air conditioned apartment is located in a strategic position: a few minutes walk from the heart of the Historic Center and just a short stroll to the Promenade.
Heidi’s apartment sleeps up to 6 people. Fully equipped, 3 bedrooms, 2 of them with queen sized beds, the third room can be twin bedded (upon request) , and 2 bathrooms.
It has a cosy kitchen with a little lounge corner and direct access to the back courtyard',
                'price_per_night' => 150.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '30',
                'final_cleaning' => '35',
                'city_tax' => '0.50',
                'property_url' => 'https://msha.ke/heidisapartments/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 1,
                'created_at' => '2022-03-30 18:05:41',
                'updated_at' => '2022-03-30 18:07:48',
            ),
            42 =>
            array (
                'id' => 87,
                'partner_id' => 89,
                'name' => 'Heidi Lovely Apartment',
                'country_id' => 87,
                'province' => 'SS',
                'villa_id' => 8,
                'property_type_id' => 1,
                'city' => 'Alghero, Province of Sassari, Italy',
                'address' => 'Via Verdi',
                'number' => '11',
                'capacity' => '07041',
                'number_of_people' => '4',
                'bedroom' => '2',
                'bathroom' => '1',
                'floor' => '0',
                'description' => 'This cosy 2 bedrooms, air conditioned apartment is located in a strategic position: a few minutes walk from the heart of the Historic Center and just a short stroll to the Promenade.
Heidi’s lovely apartment sleeps up to 4 people. Fully equipped, 2 bedrooms, 1 with queen sized bed, 1 with single bed , a sofabed in the living-room and 1 bathrooms.
It has a little lounge corner in its a private terrace',
                'price_per_night' => 80.0,
                'currency' => 'Euro - €',
                'each_extra_guest' => '30',
                'final_cleaning' => '35',
                'city_tax' => '0.50',
                'property_url' => 'https://msha.ke/heidisapartments/',
                'draft' => 0,
                'verify' => 1,
                'block' => 0,
                'reject' => 0,
                'featured' => 1,
                'created_at' => '2022-03-30 18:33:27',
                'updated_at' => '2022-03-30 20:52:46',
            ),
        ));


    }
}
