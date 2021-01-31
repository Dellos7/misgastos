USE misgastos;
ALTER DATABASE misgastos CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS users(
    id VARCHAR(23) NOT NULL,
    email VARCHAR(100) NOT NULL,
    name VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
    last_name VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
    role VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    CONSTRAINT pk_users PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS tipo_gasto(
    id VARCHAR(23) NOT NULL,
    nombre VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
    CONSTRAINT pk_tipo_gasto PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS tipo_recurrencia(
    id VARCHAR(23) NOT NULL,
    nombre VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
    CONSTRAINT pk_tipo_recurrencia PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS gasto(
    id VARCHAR(23) NOT NULL,
    nombre VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
    descripcion TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
    tipo_id VARCHAR(23) NOT NULL,
    recurrente BOOLEAN NOT NULL DEFAULT 0,
    tipo_recurrencia_id VARCHAR(23) DEFAULT NULL,
    coste INTEGER(6) NOT NULL,
    user_id VARCHAR(23) NOT NULL,
    CONSTRAINT pk_gasto PRIMARY KEY(id),
    CONSTRAINT fk_tipo_gasto_id FOREIGN KEY(tipo_id) REFERENCES tipo_gasto(id),
    CONSTRAINT fk_tipo_recurrencia_id FOREIGN KEY(tipo_recurrencia_id) REFERENCES tipo_recurrencia(id),
    CONSTRAINT fk_users FOREIGN KEY(user_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS gasto_concreto(
    id VARCHAR(23) NOT NULL,
    nombre VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
    descripcion TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
    coste INTEGER(6) NOT NULL,
    fecha DATETIME NOT NULL,
    gasto_id VARCHAR(23),
    user_id VARCHAR(23) NOT NULL,
    CONSTRAINT pk_gasto_concreto PRIMARY KEY(id),
    CONSTRAINT fk_gasto FOREIGN KEY(gasto_id) REFERENCES gasto(id),
    CONSTRAINT fk_user_id FOREIGN KEY(user_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;