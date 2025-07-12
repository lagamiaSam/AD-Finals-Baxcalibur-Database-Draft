CREATE TABLE IF NOT EXISTS public."trips" (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    destination VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price NUMERIC(10, 2) NOT NULL CHECK (price >= 0),
    start_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL
);