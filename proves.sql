-- Crear la base de dades
CREATE DATABASE classik_shop;

-- Utilitzar la base de dades
USE classik_shop;

-- Crear la taula de productes
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    category VARCHAR(100), -- Afegit per agrupar tipus de productes
    sku VARCHAR(50) UNIQUE, -- Codi únic del producte
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data de creació
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Data d'última actualització
    discount DECIMAL(5, 2) DEFAULT 0, -- Percentatge o valor de descompte
    visibility BOOLEAN DEFAULT 1, -- 1 per visible, 0 per ocult
    tags VARCHAR(255), -- Paraules clau per a SEO i cerques
    weight INT DEFAULT 0, -- Pes en grams
    dimensions VARCHAR(50), -- Dimensions en format "LxWxH" en cm
    featured BOOLEAN DEFAULT 0, -- 1 per destacat, 0 per normal
    supplier VARCHAR(100), -- Nom del proveïdor
    stock_threshold INT DEFAULT 5 -- Llindar d'estoc crític
);

--Verifica que s'ha creat correctament:

SHOW TABLES;
DESCRIBE products;

-- Afegir dades de prova - Inserció SQL
INSERT INTO products (name, description, price, stock, category, sku, weight, dimensions, featured, supplier, discount, tags) 
VALUES 
-- Tasses
('Tassa Irreverent', 'Tassa amb disseny atrevit', 12.95, 50, 'tasses', 'TASSA-001', 500, '10x10x15', 1, 'Proveïdor 1', 0, 'tassa, irreverent, ceràmica'),
('Tassa Rebel', 'Tassa amb frases impactants', 14.95, 40, 'tasses', 'TASSA-002', 520, '10x10x15', 0, 'Proveïdor 1', 5, 'tassa, rebel, disseny únic'),
('Tassa Minimal', 'Disseny minimalista i elegant', 11.95, 25, 'tasses', 'TASSA-003', 450, '9x9x14', 1, 'Proveïdor 3', 0, 'minimal, tassa, elegant'),

-- Samarretas
('Samarreta Rebel', 'Samarreta amb missatge atrevit', 19.95, 30, 'samarretes', 'SAMARRETA-001', 200, '30x20x1', 1, 'Proveïdor 2', 10, 'samarreta, missatge, rebel'),
('Samarreta Catalana', 'Mostra el teu orgull català', 21.95, 20, 'samarretes', 'SAMARRETA-002', 250, '30x20x1', 1, 'Proveïdor 2', 0, 'catalana, cultura, disseny'),
('Samarreta Clàssica', 'Disseny senzill per a cada dia', 17.95, 50, 'samarretes', 'SAMARRETA-003', 210, '30x20x1', 0, 'Proveïdor 3', 0, 'clàssica, bàsic, cotó'),

-- Gorres
('Gorra Atrevida', 'Gorra amb missatges directes', 15.95, 40, 'gorres', 'GORRA-001', 150, '15x15x10', 0, 'Proveïdor 1', 0, 'gorra, irreverent, moda'),
('Gorra Rebel', 'Amb estil únic per destacar', 17.95, 30, 'gorres', 'GORRA-002', 180, '15x15x10', 1, 'Proveïdor 3', 10, 'gorra, rebel, disseny únic'),
('Gorra Minimalista', 'Estil net i modern', 14.95, 20, 'gorres', 'GORRA-003', 160, '14x14x9', 0, 'Proveïdor 2', 0, 'minimal, gorra, elegant'),

-- Bosses
('Bossa Rebel', 'Bossa tote amb missatges forts', 10.95, 25, 'bosses', 'BOSSA-001', 300, '40x35x1', 0, 'Proveïdor 2', 0, 'bossa, rebel, sostenible'),
('Bossa Minimalista', 'Bossa senzilla i elegant', 12.95, 15, 'bosses', 'BOSSA-002', 310, '40x35x1', 1, 'Proveïdor 3', 5, 'minimal, bossa, disseny'),
('Bossa Catalana', 'Amb motius de la cultura catalana', 13.95, 20, 'bosses', 'BOSSA-003', 320, '40x35x1', 0, 'Proveïdor 1', 0, 'catalana, cultura, rebel'),

-- Pòsters
('Pòster Català', 'Pòster amb frases icòniques', 9.95, 30, 'pòsters', 'POSTER-001', 50, '50x40x0.1', 1, 'Proveïdor 1', 0, 'pòster, català, irreverent'),
('Pòster Rebel', 'Per decorar amb estil únic', 11.95, 15, 'pòsters', 'POSTER-002', 60, '50x40x0.1', 0, 'Proveïdor 2', 5, 'pòster, rebel, atrevit'),
('Pòster Minimal', 'Estil senzill però impactant', 8.95, 25, 'pòsters', 'POSTER-003', 55, '50x40x0.1', 0, 'Proveïdor 3', 0, 'pòster, minimalista, elegant'),

-- Altres
('Adhesiu Rebel', 'Paquet d\'adhesius únics', 5.95, 50, 'adhesius', 'ADHESIU-001', 100, '5x5x0.2', 0, 'Proveïdor 2', 0, 'adhesiu, rebel, disseny'),
('Adhesiu Català', 'Adhesius amb frases en català', 6.95, 40, 'adhesius', 'ADHESIU-002', 120, '5x5x0.2', 1, 'Proveïdor 1', 5, 'adhesiu, català, rebel'),
('Adhesiu Minimalista', 'Dissenys nets i moderns', 4.95, 30, 'adhesius', 'ADHESIU-003', 90, '5x5x0.2', 0, 'Proveïdor 3', 0, 'adhesiu, minimalista, disseny'),
('Llibreta Rebel', 'Llibreta amb frases icòniques', 12.95, 20, 'llibretes', 'LLIBRETA-001', 500, '21x15x2', 0, 'Proveïdor 2', 0, 'llibreta, rebel, disseny'),
('Llibreta Catalana', 'Dissenys amb arrels catalanes', 13.95, 10, 'llibretes', 'LLIBRETA-002', 520, '21x15x2', 1, 'Proveïdor 1', 10, 'llibreta, catalana, cultura');


