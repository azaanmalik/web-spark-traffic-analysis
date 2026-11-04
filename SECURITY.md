# Security policy

**This project is a local educational prototype, not a production-ready traffic analytics service.**

## Known areas requiring remediation

- The SQL export contains sample user records and encoded passwords; these must not be reused for real accounts.
- Review registration/login code for secure password hashing, authorization and session protections.
- The tracker constructs SQL using request values; use parameterized statements before public deployment.
- Several PHP files contain hard-coded local database settings.
- IP addresses and user-agent data require an appropriate privacy notice, retention policy, and access controls.
- The bot/real-traffic heuristic is not reliable fraud detection.

Do not submit actual passwords, tokens, or personal data in public issues. Report vulnerabilities privately to the repository owner.
