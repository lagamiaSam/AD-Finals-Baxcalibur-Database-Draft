-- CREATE TYPE booking_status AS ENUM ('pending', 'confirmed', 'cancelled');

CREATE TABLE IF NOT EXISTS public."bookings" (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    user_id UUID NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    trip_id UUID NOT NULL REFERENCES trips(id) ON DELETE CASCADE,
    booking_date TIMESTAMP NOT NULL DEFAULT NOW(),
    status booking_status NOT NULL DEFAULT 'pending',
    updated_at TIMESTAMP DEFAULT NOW(),
    UNIQUE (user_id, trip_id)
);
