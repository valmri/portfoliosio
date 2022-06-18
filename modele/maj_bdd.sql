-- Modification clé primaire table acquis
ALTER TABLE `acquis` DROP `id`;
ALTER TABLE `acquis` ADD PRIMARY KEY(`id_competence`);

-- Ajout des nouvelles colonnes : dateCreation et dateModification
ALTER TABLE `acquis` ADD COLUMN dateCreation datetime;
ALTER TABLE `acquis` ADD COLUMN dateModification datetime;

ALTER TABLE `projet` ADD COLUMN dateCreation datetime;
ALTER TABLE `projet` ADD COLUMN dateModification datetime;

ALTER TABLE `projet` ADD COLUMN dateCreation datetime;
ALTER TABLE `projet` ADD COLUMN dateModification datetime;