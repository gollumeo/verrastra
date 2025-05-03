# Verrastra (WIP)

![WIP](https://img.shields.io/badge/status-WIP-orange?style=for-the-badge&logo=codewars)
![Mythical](https://img.shields.io/badge/type-mythical-lightgrey?style=for-the-badge&logo=php)
![NoClosures](https://img.shields.io/badge/closures-optional-blueviolet?style=for-the-badge&logo=dependabot)

> ⚠️ **Work In Progress** — This runner is being forged. Expect rough edges, sharp ideas, and sacred refactors.

> **"The last test runner you'll ever trust."**

A modern test runner for PHP.
Built for developers who test **intentions**, not just **methods**.

---

## 1. Why Verrastra exists

PHPUnit is rigid. Pest is abstract.

Neither fully serves developers who:

- Care about **intent clarity** more than function naming
- Need **structure** without boilerplate
- Want to **test business logic** like it’s a workflow
- Refuse to choose between **OOP architecture** and **developer ergonomics**

**Verrastra** is a new breed:

- Attribute-powered
- Reflection-based
- Intention-first
- Zero closures required

It is not a wrapper.
It is not a DSL clone.
It is a **mythical entity built to enforce the truth**.

---

## 2. What makes Verrastra different?

### ✨ Attribute-Driven Tests

Declare tests using pure PHP attributes — no naming conventions, no magic prefixes:

```php
use Verrastra\Attributes\Test;

#[Test]
public function classifies_netflix_as_subscription(): void
{
    // Your logic here
}
```

### 🧱 Structured by Interface

Each test case implements the `SpecCase` interface:

```php
use Verrastra\Contracts\SpecCase;
use Verrastra\Attributes\Given;
use Verrastra\Attributes\When;
use Verrastra\Attributes\Then;

final class NetflixClassification implements SpecCase
{
    #[Given]
    public function transaction(): Transaction
    {
        return new Transaction(...);
    }

    #[When]
    public function classify(Transaction $tx): string
    {
        return (new Classifier)->classify($tx);
    }

    #[Then]
    public function assert(string $category): void
    {
        Assert::equals('Subscription', $category);
    }
}
```

### 🧘 Zero Closures by Default

You can use closures if you want.
But you never **have to**.
Structure is encouraged. Intention is mandatory.

### 🔮 Reflexive by Design

Every component of Verrastra is testable — including the runner.
Test your tests. Spec your specs.
You are now inside the mirror.

### 🔥 CLI that respects your eyes

```bash
vendor/bin/verrastra
```

- Zero config needed to start
- Human-readable output
- Silent by default, focused when needed
- Flags coming soon: `--focus`, `--json`, `--tap`, `--profile`

---

## 3. MVP Capabilities

- Run attribute-based tests using only one command: `vendor/bin/verrastra`
- Support for `#[Test]`, `#[Given]`, `#[When]`, `#[Then]` attributes
- Auto-discovery of test classes implementing `SpecCase`
- Execution order defined by annotated methods (no method name magic)
- Colored, minimal CLI output
- Fully testable internal runner API
- Strict typing enforced throughout
- Zero config setup: works out of the box

---

## 4. Future Roadmap

- Add `#[And]` and `#[BeforeAll]`, `#[AfterAll]` annotations
- Parallel execution of test suites
- Fine-grained CLI filtering: `--only`, `--exclude`, `--pattern`
- Support for output formatters (JSON, TAP, JUnit)
- Introspection mode (`--debug`) for analyzing test flows
- IDE integrations for annotations and feedback
- Laravel bridge (optional package)
- Auto-mocking & dependency faking helpers

---

## 5. Philosophy

> A test is not a script.
> A test is not a method.
> A test is a **statement of truth** under specific conditions.

Verrastra lets you **write tests as incantations**, not instructions.
You’re not just checking values—you’re **revealing intention**.

> Truth has a shape. This runner respects it.

---

## 6. License

MIT—but if you fork it, **make it worth the myth.**

---

**Verrastra** isn’t just for developers.
It’s for those who stand between the chaos of change and the sanctity of meaning.

And if that’s you?

> Then the CLI awaits: `vendor/bin/verrastra`
