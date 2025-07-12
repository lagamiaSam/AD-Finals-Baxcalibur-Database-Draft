-- CREATE TYPE payment_status AS ENUM ('pending', 'paid', 'failed');

CREATE TABLE IF NOT EXISTS public."payments" (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    booking_id UUID NOT NULL REFERENCES bookings(id) ON DELETE CASCADE,
    amount NUMERIC(10, 2) NOT NULL,
    payment_date TIMESTAMP DEFAULT NOW(),
    status payment_status NOT NULL DEFAULT 'paid',
    payment_method VARCHAR(50) NOT NULL,
    updated_at TIMESTAMP DEFAULT NOW()
);
