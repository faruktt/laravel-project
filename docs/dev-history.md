# Development History Log (Q1 2025)

Continuous progress, architecture milestones, and module improvements for the Hotel & Room Management System.

### 2025-01-01 14:09
- **Commit**: `feat: implement room status filter in dashboard`
- **Details**: Added query filter for active and maintenance room statuses.

### 2025-01-02 13:46
- **Commit**: `docs: update booking lifecycle architecture notes`
- **Details**: Documented state transitions from pending to confirmed bookings.

### 2025-01-02 15:30
- **Commit**: `refactor: clean up customer controller query logic`
- **Details**: Streamlined customer retrieval and eager-loaded room associations.

### 2025-01-02 19:14
- **Commit**: `fix: handle edge case in customer phone format`
- **Details**: Added regex sanitization for Bangladeshi and international phone formats.

### 2025-01-03 18:39
- **Commit**: `feat: add room pricing helper functions`
- **Details**: Created utility method to compute seasonal room rates.

### 2025-01-04 16:30
- **Commit**: `style: improve room listing table layout`
- **Details**: Refined responsive spacing and badge alignment in blade view.

### 2025-01-04 19:19
- **Commit**: `feat: implement room search by capacity`
- **Details**: Added dropdown filter for single, double, and deluxe capacity.

### 2025-01-05 10:12
- **Commit**: `docs: document API error response structure`
- **Details**: Added schema definitions for standard 400, 401, 404, and 422 JSON errors.

### 2025-01-05 11:45
- **Commit**: `refactor: optimize invoice generation calculations`
- **Details**: Cached repetitive tax and subtotal calculations during invoice render.

### 2025-01-07 16:09
- **Commit**: `fix: adjust notification timestamp timezone offset`
- **Details**: Ensured created_at timestamps reflect Asia/Dhaka timezone.

### 2025-01-07 19:29
- **Commit**: `feat: add customer payment status indicators`
- **Details**: Visual badges for paid, partial, and pending balances.

### 2025-01-08 14:05
- **Commit**: `test: add validation check for room reservation dates`
- **Details**: Unit test verifying until_date must be after from_date.

### 2025-01-08 18:48
- **Commit**: `refactor: modularize frontend navbar links`
- **Details**: Extracted repetitive navigation markup into shared component.

### 2025-01-08 18:53
- **Commit**: `feat: add export button placeholder on customer table`
- **Details**: Prepared UI hook for CSV and Excel customer export.

### 2025-01-10 11:23
- **Commit**: `docs: add setup instructions for local MySQL database`
- **Details**: Updated development prerequisites with database configuration tips.

### 2025-01-10 15:15
- **Commit**: `fix: prevent duplicate contact message submissions`
- **Details**: Added form submission debounce and rate limit validation.

