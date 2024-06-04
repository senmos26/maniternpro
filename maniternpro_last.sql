create database maniternpro_last;
CREATE TABLE etablissements (
    id         BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom        VARCHAR(250) NOT NULL,
    adresse    VARCHAR(250) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) COLLATE=utf8mb4_unicode_ci;

CREATE TABLE failed_jobs (
    id         BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    uuid       VARCHAR(255) NOT NULL,
    connection TEXT NOT NULL,
    queue      TEXT NOT NULL,
    payload    LONGTEXT NOT NULL,
    exception  LONGTEXT NOT NULL,
    failed_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid)
) COLLATE=utf8mb4_unicode_ci;

CREATE TABLE migrations (
    id        INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    migration VARCHAR(255) NOT NULL,
    batch     INT NOT NULL
) COLLATE=utf8mb4_unicode_ci;

CREATE TABLE password_reset_tokens (
    email      VARCHAR(255) PRIMARY KEY,
    token      VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL
) COLLATE=utf8mb4_unicode_ci;

CREATE TABLE personal_access_tokens (
    id             BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tokenable_type VARCHAR(255) NOT NULL,
    tokenable_id   BIGINT UNSIGNED NOT NULL,
    name           VARCHAR(255) NOT NULL,
    token          VARCHAR(64) NOT NULL,
    abilities      TEXT NULL,
    last_used_at   TIMESTAMP NULL,
    expires_at     TIMESTAMP NULL,
    created_at     TIMESTAMP NULL,
    updated_at     TIMESTAMP NULL,
    CONSTRAINT personal_access_tokens_token_unique UNIQUE (token)
) COLLATE=utf8mb4_unicode_ci;

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index
    ON personal_access_tokens (tokenable_type, tokenable_id);

CREATE TABLE services (
    id         BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    libelle    VARCHAR(250) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) COLLATE=utf8mb4_unicode_ci;

CREATE TABLE bureaus (
    id         BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    libelle    VARCHAR(250) NOT NULL,
    service_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    CONSTRAINT bureaus_service_id_foreign FOREIGN KEY (service_id) REFERENCES services (id)
) COLLATE=utf8mb4_unicode_ci;

CREATE TABLE stages (
    id          BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre_sujet VARCHAR(250) NOT NULL,
    statut      VARCHAR(45) NOT NULL,
    date_debut  DATE NOT NULL,
    date_fin    DATE NOT NULL,
    created_at  TIMESTAMP NULL,
    updated_at  TIMESTAMP NULL
) COLLATE=utf8mb4_unicode_ci;
delimiter //
CREATE DEFINER=root@localhost TRIGGER create_attestation_after_stage_update
    AFTER UPDATE
    ON stages
    FOR EACH ROW
BEGIN
    IF NEW.statut = 'Terminé' THEN
        INSERT INTO attestations (stagiaire_id, stage_id, statut, bureau_id, service_id, date_prise, created_at, updated_at)
        SELECT stagiaires.id, NEW.id, 'Terminé', stagiaires.bureau_id, bureaus.service_id, NOW(), NOW(), NOW()
        FROM stagiaires
                 INNER JOIN bureaus ON stagiaires.bureau_id = bureaus.id
        WHERE stagiaires.stage_id = NEW.id;
    END IF;
END ;
delimiter;

CREATE TABLE stagiaires (
    id               BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cin              VARCHAR(50) NOT NULL,
    nom              VARCHAR(250) NOT NULL,
    prenom           VARCHAR(250) NOT NULL,
    email            VARCHAR(250) NOT NULL,
    tel              VARCHAR(20) NOT NULL,
    etablissement_id BIGINT UNSIGNED NOT NULL,
    stage_id         BIGINT UNSIGNED NOT NULL,
    bureau_id        BIGINT UNSIGNED NOT NULL,
    created_at       TIMESTAMP NULL,
    updated_at       TIMESTAMP NULL,
    CONSTRAINT stagiaires_cin_unique UNIQUE (cin),
    CONSTRAINT stagiaires_bureau_id_foreign FOREIGN KEY (bureau_id) REFERENCES bureaus (id) ON DELETE CASCADE,
    CONSTRAINT stagiaires_etablissement_id_foreign FOREIGN KEY (etablissement_id) REFERENCES etablissements (id),
    CONSTRAINT stagiaires_stage_id_foreign FOREIGN KEY (stage_id) REFERENCES stages (id)
) COLLATE=utf8mb4_unicode_ci;

CREATE TABLE absences (
    id            BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date_debut    DATE NOT NULL,
    date_fin      DATE NOT NULL,
    justification VARCHAR(250) NOT NULL,
    stagiaire_id  BIGINT UNSIGNED NOT NULL,
    created_at    TIMESTAMP NULL,
    updated_at    TIMESTAMP NULL,
    CONSTRAINT absences_stagiaire_id_foreign FOREIGN KEY (stagiaire_id) REFERENCES stagiaires (id) ON DELETE CASCADE
) COLLATE=utf8mb4_unicode_ci;

CREATE TABLE attestations (
    id           BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    stagiaire_id BIGINT UNSIGNED NOT NULL,
    stage_id     BIGINT UNSIGNED NOT NULL,
    statut       VARCHAR(50) NOT NULL,
    bureau_id    BIGINT UNSIGNED NOT NULL,
    service_id   BIGINT UNSIGNED NOT NULL,
    date_prise   DATETIME NOT NULL,
    created_at   TIMESTAMP NULL,
    updated_at   TIMESTAMP NULL,
    CONSTRAINT attestations_bureau_id_foreign FOREIGN KEY (bureau_id) REFERENCES bureaus (id) ON DELETE CASCADE,
    CONSTRAINT attestations_service_id_foreign FOREIGN KEY (service_id) REFERENCES services (id),
    CONSTRAINT attestations_stage_id_foreign FOREIGN KEY (stage_id) REFERENCES stages (id),
    CONSTRAINT attestations_stagiaire_id_foreign FOREIGN KEY (stagiaire_id) REFERENCES stagiaires (id) ON DELETE CASCADE,
    CONSTRAINT fk_attestations_stagiaire_id FOREIGN KEY (stagiaire_id) REFERENCES stagiaires (id) ON DELETE CASCADE
) COLLATE=utf8mb4_unicode_ci;

CREATE TABLE c_v_s (
    id           BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    url          VARCHAR(250) NOT NULL,
    stagiaire_id BIGINT UNSIGNED NOT NULL,
    created_at   TIMESTAMP NULL,
    updated_at   TIMESTAMP NULL,
    CONSTRAINT cvs_stagiaire_id_unique UNIQUE (stagiaire_id),
    CONSTRAINT cvs_url_unique UNIQUE (url),
    CONSTRAINT cvs_stagiaire_id_foreign FOREIGN KEY (stagiaire_id) REFERENCES stagiaires (id) ON DELETE CASCADE
) COLLATE=utf8mb4_unicode_ci;

CREATE TABLE users (
    id                BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name              VARCHAR(255) NOT NULL,
    email             VARCHAR(255) NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password          VARCHAR(255) NOT NULL,
    remember_token    VARCHAR(100) NULL,
    created_at        TIMESTAMP NULL,
    updated_at        TIMESTAMP NULL,
    CONSTRAINT users_email_unique UNIQUE (email)
) COLLATE=utf8mb4_unicode_ci;
